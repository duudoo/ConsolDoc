<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Contract;
use Illuminate\Support\Facades\Http;

class ContractChatbot extends Component
{
    public $contractId;
    public $question = '';
    public $answer = '';

    public function mount($contractId) {
        $this->contractId = $contractId;
    }

    public function askQuestion()
    {
        $contract = Contract::find($this->contractId);
        $context = $contract->body;

        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . config('services.openai.key')
        ])->post('https://api.openai.com/v1/chat/completions', [
            'model' => 'gpt-3.5-turbo',
            'messages' => [
                ['role' => 'system', 'content' => 'You are a helpful contract assistant.'],
                ['role' => 'user', 'content' => "Here's the contract:

" . $context],
                ['role' => 'user', 'content' => $this->question],
            ]
        ]);

        $this->answer = $response->json()['choices'][0]['message']['content'] ?? 'No response.';
    }

    public function render()
    {
        return view('contracts.chat', ['contract' => Contract::find($this->contractId)]);
    }
}
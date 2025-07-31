<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\AISetting;

class AISettings extends Component
{
    public $openai_api_key;
    public $claude_api_key;

    public function mount()
    {
        $setting = AISetting::firstOrCreate(['team_id' => Auth::user()->currentTeam->id]);

        $this->openai_api_key = $setting->openai_api_key;
        $this->claude_api_key = $setting->claude_api_key;
    }

    public function save()
    {
        AISetting::updateOrCreate(
            ['team_id' => Auth::user()->currentTeam->id],
            [
                'openai_api_key' => $this->openai_api_key,
                'claude_api_key' => $this->claude_api_key,
            ]
        );

        session()->flash('message', 'AI API keys updated successfully!');
    }

    public function render()
    {
        return view('livewire.ai-settings');
    }
}

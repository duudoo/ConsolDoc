<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Signature;
use Illuminate\Support\Facades\Auth;

class SignaturePad extends Component
{
    public $contractId;
    public $signatureData;

    public function save()
    {
        $this->validate([
            'contractId' => 'required|exists:contracts,id',
            'signatureData' => 'required|string',
        ]);

        Signature::create([
            'contract_id' => $this->contractId,
            'user_id' => Auth::id(),
            'signature_data' => $this->signatureData,
            'signed_at' => now(),
        ]);

        session()->flash('message', 'Signature saved successfully!');
        $this->signatureData = null;
    }

    public function render()
    {
        return view('livewire.signature-pad');
    }
}

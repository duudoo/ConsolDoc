<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;

class ApprovalStepBuilder extends Component
{
    public $steps = [];

    public function addStep()
    {
        $this->steps[] = ['approver_id' => '', 'role' => '', 'order' => count($this->steps)+1];
    }

    public function removeStep($index)
    {
        unset($this->steps[$index]);
        $this->steps = array_values($this->steps);
    }

    public function render()
    {
        return view('livewire.approval-step-builder', ['users' => User::all()]);
    }
}
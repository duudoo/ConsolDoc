<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\ClauseTemplate;

class ClauseInserter extends Component
{
    public $contractId;
    public $clauses;

    public function mount($contractId) {
        $this->contractId = $contractId;
        $this->clauses = ClauseTemplate::all();
    }

    public function insert($clauseId) {
        $clause = ClauseTemplate::find($clauseId);
        $this->dispatchBrowserEvent('insertClause', ['content' => $clause->content]);
    }

    public function render() {
        return view('livewire.clause-inserter', ['clauses' => $this->clauses]);
    }
}
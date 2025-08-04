<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Annotation;
use Illuminate\Support\Facades\Auth;

class AnnotationPanel extends Component
{
    public $contractId;
    public $annotations;
    public $selectedAnnotation;
    public $comment = '';
    public $clauseType = '';

    protected $listeners = [
        'createAnnotation' => 'createAnnotation',
        'editAnnotation' => 'editAnnotation',
    ];

    public function mount($contractId)
    {
        $this->contractId = $contractId;
        $this->annotations = Annotation::where('contract_id', $contractId)->get();
    }

    public function createAnnotation($data)
    {
        $ann = Annotation::create([
            'contract_id' => $this->contractId,
            'user_id' => Auth::id(),
            'page_number' => $data['page'],
            'x' => $data['x'],
            'y' => $data['y'],
            'width' => $data['width'],
            'height' => $data['height'],
            'clause_type' => $data['clause_type'],
            'comment' => $data['comment'],
        ]);

        $this->annotations->push($ann);
    }

    public function editAnnotation($id, $comment, $clauseType)
    {
        $annotation = Annotation::find($id);
        if ($annotation) {
            $annotation->update(['comment' => $comment, 'clause_type' => $clauseType]);
        }
    }

    public function render()
    {
        return view('livewire.annotation-panel', ['annotations' => $this->annotations]);
    }
}
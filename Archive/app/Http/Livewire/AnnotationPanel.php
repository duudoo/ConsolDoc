<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\Annotation;
use App\Models\ContractOcr;
use App\Services\ClauseSuggestionService;

class AnnotationPanel extends Component
{
    public $contractId;
    public $annotations;
    public $selectedAnnotation;
    public $comment = '';
    public $clauseType = '';
    public $page = 1;
    public $x = 0;
    public $y = 0;
    public $width = 0;
    public $height = 0;
    public $suggestedClauses = [];

    protected $listeners = [
        'annotationClicked' => 'loadAnnotationForm',
        'createAnnotation' => 'createAnnotation',
        'triggerClauseSuggestion' => 'suggestClauses'
    ];

    public function mount($contractId)
    {
        $this->contractId = $contractId;
        $this->annotations = Annotation::where('contract_id', $contractId)->get();
    }

    public function loadAnnotationForm($annotationId)
    {
        $this->selectedAnnotation = Annotation::find($annotationId);
        $this->comment = $this->selectedAnnotation->comment;
        $this->clauseType = $this->selectedAnnotation->clause_type;
    }

    public function createAnnotation($data)
    {
        $annotation = Annotation::create([
            'contract_id' => $this->contractId,
            'user_id' => Auth::id(),
            'page_number' => $data['page'],
            'x' => $data['x'],
            'y' => $data['y'],
            'width' => $data['width'],
            'height' => $data['height'],
            'clause_type' => $data['clause_type'] ?? '',
            'comment' => $data['comment'] ?? '',
        ]);

        $this->annotations->push($annotation);
        $this->selectedAnnotation = $annotation;
        $this->comment = $annotation->comment;
        $this->clauseType = $annotation->clause_type;
    }

    public function save()
    {
        if ($this->selectedAnnotation) {
            $this->selectedAnnotation->update([
                'comment' => $this->comment,
                'clause_type' => $this->clauseType,
            ]);
            session()->flash('message', 'Annotation updated!');
        }
    }

    public function saveSuggestedClause($index)
    {
        $data = $this->suggestedClauses[$index];

        $annotation = Annotation::create([
            'contract_id' => $this->contractId,
            'user_id' => Auth::id(),
            'page_number' => $data['page'],
            'x' => $data['x'],
            'y' => $data['y'],
            'width' => $data['width'],
            'height' => $data['height'],
            'clause_type' => $data['clause'],
            'comment' => 'Suggested by AI',
        ]);

        $this->annotations->push($annotation);
        unset($this->suggestedClauses[$index]);
        session()->flash('message', 'Clause saved as annotation.');
    }

    public function suggestClauses()
    {
        $ocrPages = ContractOcr::where('contract_id', $this->contractId)->get();
        $fullText = $ocrPages->pluck('text_content')->implode("\n");

        $service = new ClauseSuggestionService();
        try {
            $clauses = $service->suggestClauses($fullText);
        } catch (\Exception $e) {
            session()->flash('message', 'AI clause suggestion failed: ' . $e->getMessage());
            return;
        }

        $this->suggestedClauses = [];
        foreach ($clauses as $clause) {
            $this->suggestedClauses[] = [
                'clause' => $clause['clause'] ?? 'Unknown',
                'page' => 1,
                'x' => rand(80, 200),
                'y' => rand(100, 300),
                'width' => 250,
                'height' => 40
            ];
        }
    }

    public function render()
    {
        $this->annotations = Annotation::where('contract_id', $this->contractId)->get();
        return view('livewire.annotation-panel');
    }
}

<div>
    <h5>Annotations</h5>
    <ul class="list-group">
        @foreach($annotations as $ann)
            <li class="list-group-item" wire:click="$emit('annotationClicked', {{ $ann->id }})">
                Page {{ $ann->page_number }}: {{ $ann->clause_type ?? 'Note' }}
            </li>
        @endforeach
    </ul>

    @include('components.ai-clause-suggest-button')

    @if($suggestedClauses)
        <h6 class="mt-4">💡 AI Suggestions</h6>
        <ul class="list-group">
            @foreach($suggestedClauses as $index => $sugg)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    Page {{ $sugg["page"] }}: {{ $sugg["clause"] }}
                    <button class="btn btn-sm btn-success" wire:click="saveSuggestedClause({{ $index }})">✔ Save</button>
                </li>
            @endforeach
        </ul>
    @endif

    <div id="pdf-annotation-overlay" style="position: absolute; top: 0; left: 0; pointer-events: none;">
        @foreach($annotations as $ann)
            @php
                $color = match($ann->clause_type) {
                    'Termination' => 'rgba(255,0,0,0.3)',
                    'Governing Law' => 'rgba(0,128,0,0.3)',
                    default => 'rgba(0,0,255,0.3)'
                };
            @endphp
            <div
                class="annotation-box"
                data-id="{{ $ann->id }}"
                style="
                    position: absolute;
                    top: {{ $ann->y }}px;
                    left: {{ $ann->x }}px;
                    width: {{ $ann->width }}px;
                    height: {{ $ann->height }}px;
                    background-color: {{ $color }};
                    border: 2px solid #000;
                    cursor: move;
                "
                title="{{ $ann->clause_type }}"
            ></div>
        @endforeach

        @foreach($suggestedClauses as $sugg)
            <div
                class="suggestion-box"
                style="
                    position: absolute;
                    top: {{ $sugg['y'] }}px;
                    left: {{ $sugg['x'] }}px;
                    width: {{ $sugg['width'] }}px;
                    height: {{ $sugg['height'] }}px;
                    border: 2px dashed #ffa500;
                    background-color: rgba(255,165,0,0.1);
                    pointer-events: none;
                "
                title="AI: {{ $sugg['clause'] }}"
            ></div>
        @endforeach
    </div>
</div>

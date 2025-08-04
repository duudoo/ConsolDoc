<div>
    <h5>Annotations</h5>
    <ul class="list-group">
        @foreach($annotations as $ann)
            <li class="list-group-item">
                Page {{ $ann->page_number }}: {{ $ann->clause_type ?? 'Note' }}
            </li>
        @endforeach
    </ul>
</div>
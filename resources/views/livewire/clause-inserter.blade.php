<div>
    <h5>Insert Clause</h5>
    <ul class="list-group mb-2">
        @foreach($clauses as $clause)
            <li class="list-group-item d-flex justify-content-between">
                <span>{{ $clause->title }}</span>
                <button wire:click="insert({{ $clause->id }})" class="btn btn-sm btn-primary">Insert</button>
            </li>
        @endforeach
    </ul>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        window.addEventListener('insertClause', function(e) {
            const textarea = document.querySelector('textarea[name="body"]');
            textarea.value += "\n\n" + e.detail.content;
        });
    });
</script>
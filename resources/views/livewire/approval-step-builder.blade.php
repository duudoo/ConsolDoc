<div>
    <h5>Approval Steps</h5>
    @foreach($steps as $index => $step)
        <div class="card mb-2 p-3">
            <label>Approver</label>
            <select wire:model="steps.{{ $index }}.approver_id" class="form-select">
                <option value="">-- Select --</option>
                @foreach($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endforeach
            </select>
            <label>Role</label>
            <input wire:model="steps.{{ $index }}.role" class="form-control mb-2" placeholder="e.g. Legal Reviewer" />
            <button wire:click.prevent="removeStep({{ $index }})" class="btn btn-danger btn-sm">Remove</button>
        </div>
    @endforeach
    <button wire:click.prevent="addStep" class="btn btn-secondary">Add Step</button>
</div>
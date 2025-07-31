@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Edit Draft: {{ $contract->title }}</h3>
    <form method="POST" action="{{ route('contracts.updateDraft', $contract->id) }}">
        @csrf @method('PUT')
        <div class="mb-3">
            <label class="form-label">Contract Body (Markdown)</label>
            <textarea name="body" class="form-control" rows="15">{{ old('body', $contract->body) }}</textarea>
        </div>

        <livewire:clause-inserter :contractId="$contract->id" />

        <button class="btn btn-success mt-3">Save</button>
    </form>
</div>
@endsection
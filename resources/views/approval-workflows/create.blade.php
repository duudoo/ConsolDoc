@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Create Workflow for Contract</h3>
    <form method="POST" action="{{ route('approval-workflows.store') }}">
        @csrf
        <div class="mb-3">
            <label>Contract</label>
            <select name="contract_id" class="form-select">
                @foreach($contracts as $contract)
                    <option value="{{ $contract->id }}">{{ $contract->title }}</option>
                @endforeach
            </select>
        </div>
        <livewire:approval-step-builder />
        <button class="btn btn-success mt-3">Save Workflow</button>
    </form>
</div>
@endsection
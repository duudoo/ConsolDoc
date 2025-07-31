@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Ask About Contract: {{ $contract->title }}</h3>
    <form wire:submit.prevent="askQuestion">
        <div class="mb-3">
            <input wire:model.defer="question" class="form-control" placeholder="Ask a question about the contract..." />
        </div>
        <button class="btn btn-primary">Ask</button>
    </form>

    <div class="mt-4">
        @if($answer)
            <div class="alert alert-info">
                <strong>Answer:</strong><br>{{ $answer }}
            </div>
        @endif
    </div>
</div>
@endsection
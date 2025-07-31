@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Contract: {{ $contract->title }}</h3>

    <p>This is the contract detail view. You can sign this contract below:</p>

    @livewire('signature-pad', ['contractId' => $contract->id])
</div>
@endsection

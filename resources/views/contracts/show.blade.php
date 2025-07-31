@extends('layouts.app')

@section('content')
<div class="container">
    <h3>{{ $contract->title }}</h3>
    <p>Version: {{ $contract->version }} | Team: {{ $contract->team->name ?? 'N/A' }}</p>

    <div class="pdf-viewer-container position-relative">
        <canvas id="pdf-canvas" data-page="1" width="800" height="1100"></canvas>
        <div id="pdf-annotation-overlay" style="position: absolute; top: 0; left: 0; pointer-events: none;"></div>
    </div>

    @livewire('annotation-panel', ['contractId' => $contract->id])
</div>
@endsection
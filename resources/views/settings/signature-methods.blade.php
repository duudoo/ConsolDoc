@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Signature Method Settings</h3>
    <form method="POST" action="{{ route('settings.signature-method') }}">
        @csrf
        <div class="mb-3">
            <label class="form-label">Select Preferred Method</label>
            <select name="method" class="form-select">
                <option value="in-app" {{ $method === 'in-app' ? 'selected' : '' }}>In-App Signature</option>
                <option value="eversign" {{ $method === 'eversign' ? 'selected' : '' }}>Eversign</option>
                <option value="libresign" {{ $method === 'libresign' ? 'selected' : '' }}>LibreSign (Open Source)</option>
                <option value="signserver" {{ $method === 'signserver' ? 'selected' : '' }}>SignServer (Enterprise)</option>
            </select>
        </div>
        <button class="btn btn-primary">Save</button>
    </form>
</div>
@endsection
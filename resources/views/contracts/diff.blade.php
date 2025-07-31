@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Version Diff: {{ $contract->title }}</h3>
    <div class="row">
        <div class="col">
            <h5>Old</h5>
            <pre class="bg-light p-2">{{ $old }}</pre>
        </div>
        <div class="col">
            <h5>New</h5>
            <pre class="bg-light p-2">{{ $new }}</pre>
        </div>
    </div>
</div>
@endsection
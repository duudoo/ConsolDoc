@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Shared Contract View</h3>
    <div class="card">
        <div class="card-body">
            {!! nl2br(e($contract->body)) !!}
        </div>
    </div>
@endsection
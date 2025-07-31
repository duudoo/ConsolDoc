@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Folder: {{ $folder->name }}</h3>
    <ul class="list-group">
        @foreach($folder->contracts as $contract)
            <li class="list-group-item">{{ $contract->title }}</li>
        @endforeach
    </ul>
</div>
@endsection
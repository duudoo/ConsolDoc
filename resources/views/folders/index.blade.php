@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Folders</h3>
    <a href="{{ route('folders.create') }}" class="btn btn-primary mb-3">New Folder</a>
    <ul class="list-group">
        @foreach($folders as $folder)
            <li class="list-group-item d-flex justify-content-between">
                <span>{{ $folder->name }}</span>
                <a href="{{ route('folders.show', $folder) }}" class="btn btn-sm btn-outline-secondary">View</a>
            </li>
        @endforeach
    </ul>
</div>
@endsection
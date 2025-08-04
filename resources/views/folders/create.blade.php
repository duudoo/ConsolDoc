@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Create New Folder</h3>
    <form method="POST" action="{{ route('folders.store') }}">
        @csrf
        <div class="mb-3">
            <label class="form-label">Folder Name</label>
            <input name="name" class="form-control" required />
        </div>
        <button class="btn btn-success">Create</button>
    </form>
</div>
@endsection
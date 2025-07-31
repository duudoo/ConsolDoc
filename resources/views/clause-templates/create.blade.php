@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Create Clause Template</h3>
    <form method="POST" action="{{ route('clause-templates.store') }}">
        @csrf
        <div class="mb-3">
            <label class="form-label">Title</label>
            <input name="title" class="form-control" required />
        </div>
        <div class="mb-3">
            <label class="form-label">Type</label>
            <input name="type" class="form-control" required />
        </div>
        <div class="mb-3">
            <label class="form-label">Content (Markdown)</label>
            <textarea name="content" class="form-control" rows="6"></textarea>
        </div>
        <button class="btn btn-success">Save</button>
    </form>
</div>
@endsection
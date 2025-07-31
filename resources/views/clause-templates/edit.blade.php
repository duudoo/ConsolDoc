@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Edit Clause Template</h3>
    <form method="POST" action="{{ route('clause-templates.update', $template) }}">
        @csrf @method('PUT')
        <div class="mb-3">
            <label class="form-label">Title</label>
            <input name="title" class="form-control" value="{{ $template->title }}" required />
        </div>
        <div class="mb-3">
            <label class="form-label">Type</label>
            <input name="type" class="form-control" value="{{ $template->type }}" required />
        </div>
        <div class="mb-3">
            <label class="form-label">Content</label>
            <textarea name="content" class="form-control" rows="6">{{ $template->content }}</textarea>
        </div>
        <button class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
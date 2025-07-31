@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Clause Templates</h3>
    <a href="{{ route('clause-templates.create') }}" class="btn btn-primary mb-3">New Clause Template</a>
    <table class="table">
        <thead>
            <tr>
                <th>Title</th><th>Type</th><th>Team</th><th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($templates as $template)
                <tr>
                    <td>{{ $template->title }}</td>
                    <td>{{ $template->type }}</td>
                    <td>{{ $template->team->name ?? 'Global' }}</td>
                    <td>
                        <a href="{{ route('clause-templates.edit', $template) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('clause-templates.destroy', $template) }}" method="POST" style="display:inline;">
                            @csrf @method('DELETE')
                            <button class="btn btn-sm btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Team Roles</h3>
    <form method="POST" action="{{ route('settings.roles.update') }}">
        @csrf
        <div class="mb-3">
            <label>Select Role</label>
            <select name="role" class="form-control">
                <option value="viewer">Viewer</option>
                <option value="editor">Editor</option>
                <option value="admin">Admin</option>
            </select>
        </div>
        <button class="btn btn-primary">Save Role</button>
    </form>
</div>
@endsection
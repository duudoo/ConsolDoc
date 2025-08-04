@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Approval Workflows</h3>
    <a href="{{ route('approval-workflows.create') }}" class="btn btn-primary mb-3">New Workflow</a>
    <table class="table">
        <thead><tr><th>Contract</th><th>Steps</th><th>Actions</th></tr></thead>
        <tbody>
        @foreach($workflows as $wf)
            <tr>
                <td>{{ $wf->contract->title }}</td>
                <td>{{ $wf->steps->count() }}</td>
                <td>
                    <a href="{{ route('approval-workflows.edit', $wf) }}" class="btn btn-sm btn-warning">Edit</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
@endsection
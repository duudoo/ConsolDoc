@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Signatures</h3>
    <table class="table">
        <thead><tr><th>User</th><th>Status</th><th>Signed At</th></tr></thead>
        <tbody>
            @foreach($signatures as $sig)
                <tr>
                    <td>{{ $sig->user->name }}</td>
                    <td>{{ $sig->status }}</td>
                    <td>{{ $sig->signed_at ?? '—' }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    @if(!$signed)
    <form method="POST" action="{{ route('contracts.sign', $contract->id) }}">
        @csrf
        <button class="btn btn-success">Sign This Document</button>
    </form>
    @endif
</div>
@endsection
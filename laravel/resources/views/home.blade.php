@extends('layout')
@section('content')
<!-- TODO: flash welcome message here -->
<a class="dropdown-item" href="{{ route('profile.index') }}">
    View profile
</a>
<div class="card">
    <div class="card-header">
        <h2>{{ auth()->user()->email }}</h2>
    </div>
    <div class="card-body">
        {{ auth()->user()->role }}
    </div>
</div>
@endsection
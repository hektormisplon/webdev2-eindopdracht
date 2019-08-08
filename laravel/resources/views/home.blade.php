@extends('layout')
@section('content')
<a class="dropdown-item" href="{{ route('profile.index') }}">
    View profile
</a>
<div class="card">
    <div class="card-header">
        <h3>{{ auth()->user()->email }}</h3>
    </div>
    <div class="card-body">
        {{ auth()->user()->role }}
    </div>
</div>
@endsection
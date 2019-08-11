@extends('layout')
@section('content')
<div class="card">
    <div class="card-header">
        <h3>{{ auth()->user()->email }}</h3>
    </div>
    <div class="card-body">
        {{ auth()->user()->role }}
    </div>
</div>
@endsection
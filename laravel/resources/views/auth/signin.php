@extends('layout')
@section('content')
<div>
    <h1>Sign in</h1>
    <div method='POST' action="{{ route('login')}}" class="form-group">
        @csrf
        <label class="form-label" for="email">Email</label>
        <input class="form-input" type="text" id="input-example-1" placeholder="Name">
    </div>
</div>
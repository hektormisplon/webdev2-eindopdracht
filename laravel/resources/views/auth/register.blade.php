@extends('layout')
@section('content')
<h1>{{ __('Sign up') }}</h1>
<form method="POST" action="{{ route('register') }}">
    @csrf
    <div class="form-group">
        <label class="form-label">{{ __('First name') }}</label>
        <input  class="form-input" type="text">
    </div>
    <div class="form-group">
        <label class="form-label">{{ __('Last name') }}</label>
        <input class="form-input" type="text">
    </div>
    <div class="form-group">
        <label class="form-label">{{ __('Email') }}</label>
        <input class="form-input" type="email">
    </div>
    <div class="form-group">
        <label class="form-label">{{ __('Password') }}</label>
        <input class="form-input" type="password">
    </div>
    <div class="form-group">
        <label class="form-label">{{ __('Confirm Password') }}</label>
        <input class="form-input" type="password">
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-primary">
            {{ __('Sign up') }}
        </button>
        <a href="/login" type="submit" class="btn">
            {{ __('Sign in') }}
        </a>
    </div>
</form>
@endsection
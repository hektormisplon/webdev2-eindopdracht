@extends('layout')

@section('content')
<h1>{{ __('Sign in') }}</h1>
<form method="POST" action="{{ route('login') }}">
    @csrf
    <div class="form-group">
        <label class="form-label">{{ __('Email') }}</label>
        <!-- <div class="has-icon-left"> -->
            <!-- <i class="form-icon icon icon-people"></i> -->
            <input class="form-input" type="email">
        <!-- </div> -->
    </div>
    <div class="form-group">
        <label class="form-label">{{ __('Password') }}</label>
        <!-- <div class="has-icon-left"> -->
            <!-- <i class="form-icon icon icon-people"></i> -->
            <input class="form-input" type="password">
        <!-- </div> -->
    </div>
    <!-- <div class="form-group">
        @if (Route::has('password.request'))
        <a class="btn btn-link" href="{{ route('password.request') }}">
            {{ __('Forgot password?') }}
        </a>
        @endif
        <label class="form-checkbox">
            <input type="checkbox">
            <i class="form-icon"></i> Remember me
        </label>
    </div> -->
    <div class="form-group">
        <button type="submit" class="btn btn-primary">
            {{ __('Sign in') }}
        </button>
        <a href="/register" class="btn">
            {{ __('Sign up') }}
        </a>
    </div>
</form>
@endsection
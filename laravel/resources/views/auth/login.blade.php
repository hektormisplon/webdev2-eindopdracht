@extends('layout')

@section('content')
<h1>{{ __('Sign in') }}</h1>
<form method="POST" action="{{ route('login') }}">
    @csrf
    <div class="form-group">
        <label class="form-label" for="email">{{ __('Email') }}</label>
        <input class="form-input @error('email') is-error @enderror" name="email" type="email" value="{{ old('email')}}" autofocus>
        @error('email')
            <div class="toast toast-error">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group">
        <label class="form-label" for="password">{{ __('Password') }}</label>
        <input class="form-input @error('password') is-error @enderror" name="password" type="password">
        @error('password')
            <div class="toast toast-error">{{ $message }}</div>
        @enderror
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
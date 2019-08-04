@extends('layout')
@section('content')
<h1>{{ __('Sign up') }}</h1>
<form method="POST" action="{{ route('register') }}">
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
    <div class="form-group">
        <label class="form-label" for="password-confirm">{{ __('Confirm Password') }}</label>
        <input class="form-input @error('password_confirmation') is-error @enderror" name="password_confirmation" type="password">
        @error('password_confirmation')
            <div class="toast toast-error">{{ $message }}</div>
        @enderror
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
@extends('layout')
@section('content')
<h3 class="text-bold">{{ __('Sign up') }}</h3>
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
        <label class="form-label" for="first_name">{{ __('First name') }}</label>
        <input class="form-input @error('first_name') is-error @enderror" name="first_name" type="name" value="{{ old('first_name')}}" autofocus>
        @error('first_name')
        <div class="toast toast-error">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group">
        <label class="form-label" for="last_name">{{ __('Last name') }}</label>
        <input class="form-input @error('last_name') is-error @enderror" name="last_name" type="name" value="{{ old('last_name')}}" autofocus>
        @error('last_name')
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
        <div class="btn-group btn-group-block">
            <button type="submit" class="btn btn-primary">
                {{ __('Sign up') }}
            </button>
            <a href="/login" type="submit" class="btn">
                {{ __('Sign in') }}
            </a>
        </div>
    </div>
</form>
@endsection
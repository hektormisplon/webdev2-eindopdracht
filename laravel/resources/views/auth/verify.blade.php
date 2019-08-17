@extends('layout')

@section('content')

<div class="empty">
    <i class="icon icon-3x" data-feather="mail"></i>
    <h4 class="empty-title">{{ __('Please check your email') }}</h4>
    <h6 class="empty-subtitle">We've sent you a link</h6>
    <p class="empty-title">You signed up successfully, but still need to verify your account.</p>
    <div class="empty-action">
        <a class="btn" href="{{ route('verification.resend') }}">
                <i class="icon" data-feather="mail"></i>
                {{ __('Resend') }}
            </a>
        </div>
        @if (session('resent'))
        <div class="toast toast-success">
            {{ __('We\'ve sent you another link') }}
        </div>
        @endif
    </div>
@endsection

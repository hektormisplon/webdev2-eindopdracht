@extends('layout')
@section('title', 'Creunite')
@section('content')
    <div class="flex-center position-ref full-height">
        <ul>
            @foreach ($titles as $title)
                <li>{{ $title }}</li>
            @endforeach
        </ul>
        @if (Route::has('login'))
            <div class="top-right links">
                @auth
                    <a href="{{ url('/home') }}">Home</a>
                @else
                    <a href="{{ route('login') }}">Login</a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}">Register</a>
                    @endif
                @endauth
            </div>
        @endif
    </div>
</html>
@endsection


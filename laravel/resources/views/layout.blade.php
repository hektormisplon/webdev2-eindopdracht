<!DOCTYPE html>
<html lang="en">
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', config('app.name'))</title>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=DM+Sans:700,400,400i&display=swap" rel="stylesheet">
    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="https://unpkg.com/feather-icons"></script>
    <script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>
    <style>
        .blob {
            position: fixed;
            top: 50vh;
            left: 0;
            fill: #47D6BF;
            width: 100vw;
            z-index: -10;
            opacity: .1;
            animation: move 80s cubic-bezier(0.29, 0.04, 0.23, 1) infinite;
            transform-origin: 50% 50%;
        }

        .blob-faster {
            animation: move 80s cubic-bezier(0.71, 0.96, 0.77, 0) infinite;
        }

        @keyframes move {
            0% {
                transform: scale(1) translate(10vh, 10vh);
            }

            38% {
                transform: scale(0.8, 1) translate(10vh, 10vh) rotate(160deg);
            }

            40% {
                transform: scale(0.8, 1) translate(10vh, 10vh) rotate(160deg);
            }

            78% {
                transform: scale(1.3) translate(10vh, 10vh) rotate(-20deg);
            }

            80% {
                transform: scale(1.3) translate(10vh, 10vh) rotate(-20deg);
            }

            100% {
                transform: scale(1) translate(10vh, 10vh);
            }
        }
    </style>
</head>

<body class="layout-container">
    @include('partials.header')
    <div class="content-container">
        <div class="columns">
            @auth
            <div class="column col-md-1 col-lg-3 col-xl-3 col-2">
                @include('partials.sidebar')
            </div>
            @endauth
            <div class="column col-md-10 col-lg-8 col-xl-8 col-4 col-1-mx-auto @guest p-centered @endguest">
                @yield('content')
            </div>
        </div>
    </div>
    @include('partials.footer')
    <script>
        feather.replace()
    </script>
</body>

</html>
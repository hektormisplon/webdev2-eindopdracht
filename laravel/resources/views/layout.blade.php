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
</head>

<body class="layout-container of-hidden">
    @include('partials.header')
    <div class="content-container">
        <div class="columns">
            @auth
            <div class="column col-md-1 col-lg-3 col-xl-3 col-2">
                @include('partials.sidebar')
            </div>
            @endauth
            <div class="column col-md-10 col-lg-8 col-xl-8 col-4 col-1-mx-auto mt-8 @guest p-centered @endguest">
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
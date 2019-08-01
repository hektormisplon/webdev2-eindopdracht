<!DOCTYPE html>
<html lang="en">
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>@yield('title')</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <!-- Styles -->
        <link rel="stylesheet" href="https://unpkg.com/spectre.css/dist/spectre.min.css">
<link rel="stylesheet" href="https://unpkg.com/spectre.css/dist/spectre-exp.min.css">
<link rel="stylesheet" href="https://unpkg.com/spectre.css/dist/spectre-icons.min.css">
    </head>
<body>
<div class="container">
    @include('partials.header')
    <div class="columns">
        <div class="column">
        @include('partials.sidebar')
        </div>
        <div class="column col-auto">
        <div class="container">
            @yield('content')
        </div>
        @include('partials.footer')
    </div>
</div>
</body>
</html>
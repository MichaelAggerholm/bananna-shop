<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv=”X-UA-Compatible” content=”ie=edge”>

    @vite(['resources/scss/app.scss', 'resources/js/app.js'])

    <title>@yield('title')</title>
    @yield('head')
</head>
<body>
@include('layouts.partials.nav')
<main class="page">
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
    @if(session('warning'))
        <div class="alert alert-warning">
            {{ session('warning') }}
        </div>
    @endif
    @yield('content')
</main>
@include('layouts.partials.footer')
</body>
</html>

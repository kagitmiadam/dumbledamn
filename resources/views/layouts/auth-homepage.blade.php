<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>
    @yield('styles')
    <link rel="stylesheet" href="{{asset('css/main.css')}}">
</head>
<body>
<main id="auth-app" class="auth-app" style="background: url('{{asset('img/homepage/bg-1.png')}}')">
    @include('components.header')
    @include('components.left-sidebar')
    <section>
        @yield('content')
    </section>
    <div class="bg-black-container"></div>
</main>
@include('components.preloader')
<!-- RPG Project | Scripts -->
<script src="{{asset('plugin/jquery.min.js')}}"></script>
<script src="{{asset('plugin/popper.min.js')}}"></script>
<script src="{{asset('plugin/bootstrap.min.js')}}"></script>
<script src="{{asset('plugin/moment-with-locales.min.js')}}"></script>
<script src="{{asset('js/main.js')}}"></script>
@yield('scripts')
</body>
</html>

<!doctype html>
<html lang="pt-Br">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Something Portal | @yield('page-title')</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @yield('css-view')
</head>
<body>
@include('templates.menu')
<section id="content-view">
    @yield('content-view')
</section>
<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
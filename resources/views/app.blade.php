<!DOCTYPE html>
<html lang="fr">
<head>
    <title>@yield('title')</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    @yield('stylesheets')
</head>
<body class="bg-slate-50">
@yield('content')
<script src="{{ asset("js/app.js") }}"></script>
@yield('javascripts')
</body>
</html>

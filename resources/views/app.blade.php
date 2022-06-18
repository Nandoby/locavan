<!DOCTYPE html>
<html lang="fr">
<head>
    <title>@yield('title')</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Location de camping-cars et vans aménagés entre particuliers">
    <!-- Facebook Meta Tags -->
    <meta property="og:url" content="{{ env('APP_URL') }}">
    <meta property="og:type" content="website">
    <meta property="og:title" content="Location Camping-car entre Particuliers - Locavan">
    <meta property="og:description" content="Location de camping-cars et vans aménagés entre particuliers">
    <meta property="og:image" content="{{ asset('locavan_opengraph.jpg') }}">

    <!-- Twitter Meta Tags -->
    <meta name="twitter:card" content="summary_large_image">
    <meta property="twitter:domain" content="{{ env("APP_DOMAIN") }}">
    <meta property="twitter:url" content="{{ env("APP_URL") }}">
    <meta name="twitter:title" content="Location Camping-car entre Particuliers - Locavan">
    <meta name="twitter:description" content="Location de camping-cars et vans aménagés entre particuliers">
    <meta name="twitter:image" content="{{ asset("locavan_opengraph.jpg") }}">

    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link rel="apple-touch-icon" sizes="57x57" href="{{ asset("apple-icon-57x57.png") }}">
    <link rel="apple-touch-icon" sizes="60x60" href="{{ asset("apple-icon-60x60.png") }}">
    <link rel="apple-touch-icon" sizes="72x72" href="{{ asset("apple-icon-72x72.png")}}">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset("apple-icon-76x76.png") }}">
    <link rel="apple-touch-icon" sizes="114x114" href="{{ asset("apple-icon-114x114.png") }}">
    <link rel="apple-touch-icon" sizes="120x120" href="{{ asset("apple-icon-120x120.png") }}">
    <link rel="apple-touch-icon" sizes="144x144" href="{{ asset("apple-icon-144x144.png") }}">
    <link rel="apple-touch-icon" sizes="152x152" href="{{ asset("apple-icon-152x152.png") }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset("apple-icon-180x180.png") }}">
    <link rel="icon" type="image/png" sizes="192x192" href="{{ asset("android-icon-192x192.png") }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset("favicon-32x32.png") }}">
    <link rel="icon" type="image/png" sizes="96x96" href="{{ asset("favicon-96x96.png") }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset("favicon-16x16.png") }}">
    @yield('stylesheets')
</head>
<body class="bg-slate-50">
@yield('content')
@include('partials.footer')
<script src="{{ asset("js/app.js") }}"></script>
@yield('javascripts')
</body>
</html>

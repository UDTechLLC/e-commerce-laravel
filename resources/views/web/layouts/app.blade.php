<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="stylesheet" href="{{ asset('web/css/base.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('web/carouselengine/initcarousel-1.css') }}">
    <!--<link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">-->
    <link rel="stylesheet" type="text/css" href="{{ asset('web/slick/slick.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('web/slick/slick-theme.css') }}">
    <!--[if lt IE 9]!!>
    <script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
</head>
<body>
    <div id="app">
        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="{{ asset('web/js/app.js') }}"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
    <script type="text/javascript" src="{{ asset('web/slick/slick.min.js')}} "></script>
    <script src="{{ asset('web/js/script.js') }}"></script>
    <script src="{{ asset('web/carouselengine/amazingcarousel.js') }}"></script>
    <script src="{{ asset('web/carouselengine/initcarousel-1.js') }}"></script>
</body>
</html>

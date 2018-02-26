<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'ShedFet') }}</title>

    @section('style')
        <link rel="stylesheet" href="{{ asset('web/css/app.css') }}">
        <link rel="stylesheet" href="{{ asset('web/css/base.css') }}">
        <!--[if lt IE 9]!!>
        <script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
    @show
</head>
<body>
<div id="app">
    @yield('content')
</div>
<!-- Scripts -->
{{--@section('scripts')--}}
    {{--<script src="{{ asset('web/js/app.js') }}"></script>--}}
    {{--<script src="https://code.jquery.com/jquery-2.2.4.min.js"--}}
            {{--integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>--}}
    {{--<script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>--}}
    {{--<script src="{{ asset('web/js/script.js') }}"></script>--}}
{{--@show--}}
</body>
</html>

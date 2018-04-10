<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{--<title>{{ config('app.name', 'Laravel') }}</title>--}}
    <title>@section('title') ShedFat @show</title>
    <!--  favicons-->

    <link rel="apple-touch-icon" sizes="120x120" href="{{ asset('web/images/new-images/favicons/apple-touch-icon.png')}}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('web/images/new-images/favicons/favicon-32x32.png')}}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('web/images/new-images/favicons/favicon-16x16.png')}}">
    <link rel="manifest" href="{{ asset('web/images/new-images/favicons/site.webmanifest')}}">
    <link rel="mask-icon" href="{{ asset('web/images/new-images/favicons/safari-pinned-tab.svg')}}" color="#ff0000">
    <link rel="shortcut icon" href="{{ asset('web/images/new-images/favicons/favicon.ico')}}">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-config" content="{{ asset('web/images/new-images/favicons/browserconfig.xml')}}">
    <meta name="theme-color" content="#ffffff">

    <!-- ////favicons-->

    @section('style')
        <link rel="stylesheet" href="{{ mix('web/css/app.css') }}">

        <link rel="stylesheet" href="{{ mix('web/css/base.css') }}">
        {{--<link rel="stylesheet" type="text/css" href="{{ asset('web/carouselengine/initcarousel-1.css') }}">--}}
        {{-- <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">--}}
        <link rel="stylesheet" type="text/css" href="{{ asset('web/slick/slick.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('web/slick/slick-theme.css') }}">
        <!--[if lt IE 9]!!>
        <script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->

<!-- Facebook Pixel Code production-->
    <script>
        !function(f,b,e,v,n,t,s)
        {if(f.fbq)return;n=f.fbq=function()

        {n.callMethod? n.callMethod.apply(n,arguments):n.queue.push(arguments)}
        ;
            if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
            n.queue=[];t=b.createElement(e);t.async=!0;
            t.src=v;s=b.getElementsByTagName(e)[0];
            s.parentNode.insertBefore(t,s)}(window, document,'script',
                'https://connect.facebook.net/en_US/fbevents.js');
        fbq('init', '252804818530741');
        fbq('track', 'PageView');
    </script>
    <noscript><img height="1" width="1" style="display:none"
                   src="https://www.facebook.com/tr?id=252804818530741&ev=PageView&noscript=1"
        /></noscript>
    <!-- End Facebook Pixel Code -->
        <!-- Facebook Pixel Code -->

       {{-- <script>
            !function(f,b,e,v,n,t,s)
            {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
                    n.callMethod.apply(n,arguments):n.queue.push(arguments)};
                if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
                n.queue=[];t=b.createElement(e);t.async=!0;
                t.src=v;s=b.getElementsByTagName(e)[0];
                s.parentNode.insertBefore(t,s)}(window, document,'script',
                    'https://connect.facebook.net/en_US/fbevents.js');
            fbq('init', '182179075753618');
            fbq('track', 'PageView');
        </script>
        <noscript><img height="1" width="1" style="display:none"
                       src="https://www.facebook.com/tr?id=182179075753618&ev=PageView&noscript=1"
            /></noscript>--}}
        <!-- End Facebook Pixel Code -->

    @show
</head>
<body>
<div id="app">
    <section class="timer">
        <h2>60% OFF SALE ENDS IN</h2>
        <div id="flipdown" class="flipdown"></div>
    </section>
    @include('web.layouts.header')
    @yield('content')
    <modal-cart></modal-cart>
    @include('web.layouts.footer')
</div>
<!-- Scripts -->
@section('scripts')

    <script src="{{ mix('web/js/app.js') }}"></script>
    <script src="https://code.jquery.com/jquery-2.2.4.min.js"
            integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/retina.js/2.1.3/retina.min.js"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
    <script type="text/javascript" src="{{ asset('web/slick/slick.min.js')}} "></script>
    <script type="text/javascript"
            src="https://cdnjs.cloudflare.com/ajax/libs/parallax.js/1.5.0/parallax.min.js"></script>
    <script src="{{ asset('web/flipdown/js/flipdown.js')}}"></script>
    <script src="{{ asset('web/js/script.js') }}"></script>
    <script src="{{ asset('web/js/modal.js')}}"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function(){
            var flipdown = new FlipDown(1523902200, 'flipdown').start();
        });
    </script>
    {{--<script src="{{ asset('web/carouselengine/amazingcarousel.js') }}"></script>--}}
    {{--<script src="{{ asset('web/carouselengine/initcarousel-1.js') }}"></script>--}}
@show
</body>
</html>

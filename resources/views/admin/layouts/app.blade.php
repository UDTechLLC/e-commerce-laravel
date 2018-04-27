<!doctype html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="@yield('description')">
    <meta name="keywords" content="@yield('keywords')">

    <title>ShedFat Admin</title>

    <!-- Bootstrap core CSS -->

    <link href="{{asset('admin_panel/css/app.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('web/css/app.css') }}">

    <link rel="stylesheet" href="{{ asset('web/css/admin-base.css') }}">


    <!--[if lt IE 9]>
   <!-- <script src="../assets/js/ie8-responsive-file-warning.js"></script>-->
    <!--[endif]-->

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body class="nav-md">
<div class="container body">
    <div class="main_container">


    @include('admin.layouts.partials.sidebar')
    @include('admin.layouts.partials.top-menu')

    <!-- page content -->
        <div class="right_col" role="main">
            <div id="app">

                @yield('content')

                <notifications group="foo-css"
                               position="bottom right"
                               :speed="500" />

            </div>
        </div>
        <!-- /page content -->


        @include('admin.layouts.partials.footer')
    </div>
</div>

<script src="{{asset('admin_panel/js/app.js')}}"></script>

</body>

</html>

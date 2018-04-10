<div class="col-md-3 left_col">
    <div class="left_col scroll-view">
        <div class="navbar nav_title" style="border: 0;">
            <a href="{{url('/')}}" class="site_title">
                <img class="logo" src="{{asset('admin_panel/images/Shedfat-logo.png')}}" alt="logo">
                <img class="mini-logo" src="{{asset('admin_panel/images/Shedfat-mini-logo.png')}}" alt="logo">
            </a>
        </div>

        <div class="clearfix"></div>

        <!-- menu profile quick info -->
        <div class="profile clearfix">
            <div class="profile_pic">
                <img src="{{asset('admin_panel/images/ava.jpg')}}" alt="..." class="img-circle profile_img">
            </div>
            <div class="profile_info">
                <span>Welcome,</span>
                <h2>{{ Auth::user()->first_name }}</h2>
            </div>
        </div>
        <!-- /menu profile quick info -->
        <br />
        <!-- sidebar menu -->
        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                    <li>
                        <a href="{{route('admin')}}"><i class="fa fa-home"></i> Home </a>
                    </li>
                </ul>
                <ul class="nav side-menu">
                    <li>
                        <a href="{{route('admin.products')}}"><i class="fa fa-cube"></i> Products </a>
                    </li>
                    <li>
                        <a href="{{route('admin.users')}}"><i class="fa fa-users"></i> Users </a>
                    </li>
                    <li>
                        <a href="{{route('admin.orders')}}"><i class="fa fa-shopping-bag"></i> Orders </a>
                    </li>
                    <li>
                        <a href="{{route('admin.coupons')}}"><i class="fa fa-tags"></i> Coupons </a>
                    </li>
                    {{--<li>
                        <a href="{{route('admin.statistics')}}"><i class="fa fa-line-chart"></i> Analytics </a>
                    </li>--}}
                    <li>
                        <a href="{{route('admin.subscriptions')}}"><i class="fa fa-tags"></i> Subscriptions </a>
                    </li>
                    <li>
                        <a href="{{route('admin.timer.edit')}}"><i class="fa fa-clock-o"></i> Countdown Clock </a>
                    </li>
                </ul>
            </div>
        </div>
        <!-- /sidebar menu -->

        @include('admin.layouts.partials.menu-footer-button')
    </div>
</div>
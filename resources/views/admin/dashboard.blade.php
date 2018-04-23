@extends('admin.layouts.app')
@section('content')
    <div class="row top_tiles">
        <div class="x_panel">
            <div class="x_title">
                <h2>Total</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <a href="{{ route('admin.orders') }}">
                        <div class="tile-stats">
                            <div class="icon"><i class="fa fa-money"></i></div>
                            <div class="count">${{ $totalSales }}</div>
                            <h3>Total sales</h3>
                        </div>
                    </a>
                </div>
                <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <a href="{{ route('admin.orders') }}">
                        <div class="tile-stats">
                            <div class="icon"><i class="fa fa-shopping-bag"></i></div>
                            <div class="count">{{ $totalOrders }}</div>
                            <h3>Total orders</h3>
                        </div>
                    </a>
                </div>
                <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <a href="{{ route('admin.users') }}">
                        <div class="tile-stats">
                            <div class="icon"><i class="fa fa-users"></i></div>
                            <div class="count">{{ $totalUsers }}</div>
                            <h3>Total users</h3>
                        </div>
                    </a>
                </div>
                <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <a href="{{ route('admin.products') }}">
                        <div class="tile-stats">
                            <div class="icon"><i class="fa fa-cube"></i></div>
                            <div class="count"> {{ $totalProducts }}</div>
                            <h3>Total products</h3>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="row top_tiles">
        <div class="x_panel">
            <div class="x_title">
                <h2>Today</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <a href="{{ route('admin.orders') }}">
                        <div class="tile-stats">
                            <div class="icon"><i class="fa fa-money"></i></div>
                            <div class="count">${{ $todaySales }}</div>
                            <h3>Total sales</h3>
                        </div>
                    </a>
                </div>
                <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <a href="{{ route('admin.orders') }}">
                        <div class="tile-stats">
                            <div class="icon"><i class="fa fa-shopping-bag"></i></div>
                            <div class="count">{{ $todayOrders }}</div>
                            <h3>Total orders</h3>
                        </div>
                    </a>
                </div>
                <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <a href="{{ route('admin.users') }}">
                        <div class="tile-stats">
                            <div class="icon"><i class="fa fa-users"></i></div>
                            <div class="count">{{ $totalUsers }}</div>
                            <h3>Total users</h3>
                        </div>
                    </a>
                </div>
                <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <a href="{{ route('admin.products') }}">
                        <div class="tile-stats">
                            <div class="icon"><i class="fa fa-cube"></i></div>
                            <div class="count"> {{ $totalTodayProducts }}</div>
                            <h3>Total products</h3>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="row top_tiles">
        <div class="x_panel">
            <div class="x_title">
                <h2>Month</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <a href="{{ route('admin.orders') }}">
                        <div class="tile-stats">
                            <div class="icon"><i class="fa fa-money"></i></div>
                            <div class="count">${{ $monthSales }}</div>
                            <h3>Total sales</h3>
                        </div>
                    </a>
                </div>
                <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <a href="{{ route('admin.orders') }}">
                        <div class="tile-stats">
                            <div class="icon"><i class="fa fa-shopping-bag"></i></div>
                            <div class="count">{{ $monthOrders }}</div>
                            <h3>Total orders</h3>
                        </div>
                    </a>
                </div>
                <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <a href="{{ route('admin.users') }}">
                        <div class="tile-stats">
                            <div class="icon"><i class="fa fa-users"></i></div>
                            <div class="count">{{ $totalUsers }}</div>
                            <h3>Total users</h3>
                        </div>
                    </a>
                </div>
                <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <a href="{{ route('admin.products') }}">
                        <div class="tile-stats">
                            <div class="icon"><i class="fa fa-cube"></i></div>
                            <div class="count"> {{ $totalMonthProducts }}</div>
                            <h3>Total products</h3>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="row top_tiles">
        <div class="x_panel">
            <div class="x_title">
                <h2>Year</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <a href="{{ route('admin.orders') }}">
                        <div class="tile-stats">
                            <div class="icon"><i class="fa fa-money"></i></div>
                            <div class="count">${{ $yearSales }}</div>
                            <h3>Total sales</h3>
                        </div>
                    </a>
                </div>
                <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <a href="{{ route('admin.orders') }}">
                        <div class="tile-stats">
                            <div class="icon"><i class="fa fa-shopping-bag"></i></div>
                            <div class="count">{{ $yearOrders }}</div>
                            <h3>Total orders</h3>
                        </div>
                    </a>
                </div>
                <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <a href="{{ route('admin.users') }}">
                        <div class="tile-stats">
                            <div class="icon"><i class="fa fa-users"></i></div>
                            <div class="count">{{ $totalUsers }}</div>
                            <h3>Total users</h3>
                        </div>
                    </a>
                </div>
                <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <a href="{{ route('admin.products') }}">
                        <div class="tile-stats">
                            <div class="icon"><i class="fa fa-cube"></i></div>
                            <div class="count"> {{ $totalYearProducts }}</div>
                            <h3>Total products</h3>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
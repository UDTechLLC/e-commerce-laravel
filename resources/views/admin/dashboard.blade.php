@extends('admin.layouts.app')
@section('content')
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
                            <div class="count">{{ $totalTodayUser }}</div>
                            <h3>Total visitors</h3>
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
                            <div class="count">{{ $totalMonthUser }}</div>
                            <h3>Total visitors</h3>
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
                            <h3>Total visitors</h3>
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
    <div class="row">
        <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>App Browsers</h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    @foreach($browsers as $item)
                    <div class="widget_summary">
                        <div class="w_left w_25">
                            <span>{{ $item['browser'] }}</span>
                        </div>
                        <div class="w_center w_55">
                            <div class="progress">
                                <div class="progress-bar bg-green" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: {{ $item['percent'] }}%;">
                                    <span class="sr-only">{{ $item['percent'] }}% Complete</span>
                                </div>
                            </div>
                        </div>
                        <div class="w_right w_20">
                            <span>{{ $item['session'] }} <small>({{ $item['percent'] }}%)</small></span>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>App Sources</h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    @foreach($sources as $item)
                        <div class="widget_summary">
                            <div class="w_left w_25">
                                <span>{{ $item['source'] }}</span>
                            </div>
                            <div class="w_center w_55">
                                <div class="progress">
                                    <div class="progress-bar bg-green" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: {{ $item['percent'] }}%;">
                                        <span class="sr-only">{{ $item['percent'] }}% Complete</span>
                                    </div>
                                </div>
                            </div>
                            <div class="w_right w_20">
                                <span>{{ $item['session'] }} <small>({{ $item['percent'] }}%)</small></span>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        </div>
    <div class="row">
        <device-chart
                :labels-props="{{ json_encode($device['labels']) }}"
                :data-props="{{  json_encode($device['session']) }}"
        ></device-chart>
    </div>

@endsection
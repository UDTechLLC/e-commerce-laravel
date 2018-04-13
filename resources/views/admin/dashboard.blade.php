@extends('admin.layouts.app')
@section('content')
    <div class="row top_tiles">
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
        <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <a href="{{ route('admin.coupons') }}">
                <div class="tile-stats">
                    <div class="icon"><i class="fa fa-tags"></i></div>
                    <div class="count">{{ $totalCoupons }}</div>
                    <h3>Total coupons</h3>
                </div>
            </a>
        </div>
    </div>
@endsection
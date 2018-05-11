@extends('admin.layouts.app')
@section('content')
    <h2>Attach product</h2>
    <!-- Start to do list -->
    <coupons-attach
        :products="{{$products}}"
        :attach-product="{{$productIds}}"
        :coupon-id="{{$coupon->getKey()}}"
    ></coupons-attach>
    <!-- End to do list -->
@endsection
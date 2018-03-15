@extends('admin.layouts.app')
@section('content')
    <h2>Coupons create</h2>
    <coupons-edit coupon-props="{{ $coupon }}"></coupons-edit>
@endsection
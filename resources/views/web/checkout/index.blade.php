@extends('web.layouts.app')
@section('title')
    Checkout -@parent
@endsection
{{--@section('style')
   @parent
   <link rel="stylesheet" href="{{ asset('web/css/select2.min.css') }}">
   @endsection--}}
@section('content')
     <checkout></checkout>
@endsection

@section('scripts')
    @parent
{{--    <script src="https://js.braintreegateway.com/web/dropin/1.9.4/js/dropin.min.js"></script>--}}

@endsection

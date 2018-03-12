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
   <script src="https://js.braintreegateway.com/web/3.31.0/js/client.min.js"></script>

   <!-- Load Hosted Fields component. -->
   <script src="https://js.braintreegateway.com/web/3.31.0/js/hosted-fields.min.js"></script>
@endsection

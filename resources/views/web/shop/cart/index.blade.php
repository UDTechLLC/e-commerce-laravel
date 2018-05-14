@extends('web.layouts.app')
@section('title')
    Shopping Cart -@parent
@endsection
@section('style')
    @parent
    <link rel="stylesheet" href="{{asset('web/css/select2.min.css')}}">
@endsection
@section('content')

    <div class="main">
        <cart></cart>
    </div>

@endsection
@section('scripts')
    @parent
    <script src="{{asset('web/js/select2.min.js')}}"></script>
@endsection

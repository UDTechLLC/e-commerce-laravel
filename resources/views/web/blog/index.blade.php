@extends('web.layouts.app')
@section('style')
    @parent
    <link rel="stylesheet" href="{{asset('web/css/blog.css')}}">
    @endsection
@section('content')
    <blog></blog>
@endsection
@extends('email.layout')

@section('content')
    <h2>Product: {{$product->title}}</h2>
    <h3><a href="{{ $link }}">Download</a></h3>
@stop

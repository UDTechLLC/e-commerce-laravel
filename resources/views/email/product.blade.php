@extends('email.layout')

@section('content')
    <img src="{{asset('web/images/logos/Shedfat-logo.png')}}" alt="logo">
    <h2>Hello, name. Your links:</h2>
    @foreach($order->products as $product)
        @if ($product->isVirtual())
            <h2>Product: {{$product->title}} <a href="{{ $product->product_link }}">Download</a></h2>
        @endif
    @endforeach
@stop

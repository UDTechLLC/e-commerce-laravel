@extends('web.layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            @foreach($product as $products)
                <div class="col-sm-4">
                    <div class="product" style="height: 300px;">
                        <a href="{{url('products/'.$products->slug)}}">
                            {{ $products->slug }}
                            <h3 class="title">{{$products->title}}</h3> </a>
                        @if($products->old_amount)
                        <p>Old Price {{ $products->old_amount }}</p>
                        @endif
                            <h4 class="price">Price: {{$products->amount}}</h4>
                        @if($products -> category)
                        <p>Category {{ $products->category }}</p>
                            @endif
                        <p> {{ $products -> description }}</p>
                    </div>
                </div>
            @endforeach
        </div>
@endsection
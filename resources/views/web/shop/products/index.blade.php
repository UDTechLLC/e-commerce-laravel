@extends('web.layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            @foreach($product as $products)
                <div class="col-sm-4">
                    <div class="product" style="height: 500px;">
                        <div class="image-wrapper">
                        <img src="{!! $products->getMedia('preview')->first()->getUrl() !!}" />
                        </div>
                        <div>
                        <a href="{{url('products/'.$products->slug)}}">
                            <h3 class="title">{!! $products->title !!}</h3> </a>
                        {{--<p>Sub_title {{ $products->sub_title }}</p>--}}
                            <h4 class="price">Price: {{$products->amount}}</h4>
                        @if($products -> category)
                        <p>Category {{ $products->category }}</p>
                            @endif
                        </div>
                        {{--<p> {{ $products -> description }}</p>--}}
                        <div class="product-button-block">
                            <div class="add-to-cart-wrapper">
                                <a class="add-to-cart-btn" href="#">
                                    Add to cart
                                </a>
                            </div>
                        </div>
                    </div>

                </div>
            @endforeach
        </div>
    </div>
@endsection
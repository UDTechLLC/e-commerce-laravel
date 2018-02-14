<!doctype html>

<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">

    <title>ShedYourFat Shop page</title>

    <link rel="stylesheet" href="{{ asset('web/css/base.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('web/carouselengine/initcarousel-1.css') }}">
    <!--<link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">-->
    <link rel="stylesheet" type="text/css" href="{{ asset('web/slick/slick.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('web/slick/slick-theme.css') }}">
    <!--[if lt IE 9]>
    <script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

</head>

<body>

<div class="main">
        <div class="shop-grid-wrapper">
            <div class="wrapper">
                <div class="shop-items-wrapper">
            @foreach($product as $products)

                {{--<div class="col-sm-4">--}}
                    {{--<div class="product" style="height: 500px;">--}}
                        {{--<div class="image-wrapper">--}}
                        {{--<img src="{!! $products->getMedia('preview')->first()->getUrl() !!}" />--}}
                        {{--</div>--}}
                        {{--<div>--}}
                        {{--<a href="{{url('products/'.$products->slug)}}">--}}
                            {{--<h3 class="title">{!! $products->title !!}</h3> </a>--}}
                        {{--<p>Sub_title {{ $products->sub_title }}</p>--}}
                            {{--<h4 class="price">Price: {{$products->amount}}</h4>--}}
                        {{--@if($products -> category)--}}
                        {{--<p>Category {{ $products->category }}</p>--}}
                            {{--@endif--}}
                        {{--</div>--}}
                        {{--<p> {{ $products -> description }}</p>--}}
                        {{--<div class="product-button-block">--}}
                            {{--<div class="add-to-cart-wrapper">--}}
                                {{--<a class="add-to-cart-btn" href="#">--}}
                                    {{--Add to cart--}}
                                {{--</a>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}

                {{--</div>--}}
                        <div class="shop-item">
                            <div class="image-wrapper">
                                <a href="#">
                                    <img src="{!! $products->getFirstMediaUrl('preview') !!}" />
                                </a>
                            </div>
                            <div class="product-details">
                                <h3 class="product-title">
                                    <a href="{{url('products/'.$products->slug)}}">
                                    {!! $products->title !!} </a>
                                </h3>
                                @if($products -> category)
                                    <p class="product-category-label"> {{ $products->category }} </p>
                                @endif

                            </div>
                            <div class="product-price-block">
                                <div class="product-price">
									<span class="product-amount">
                                        @if($products->old_amount)
                                        <del>
                                            ${{$products->old_amount}}
                                        </del>
                                        @endif
										<ins>
                                            ${{$products->amount}}
                                        </ins>
									</span>
                                </div>
                            </div>
                            <div class="product-button-block">
                                <div class="add-to-cart-wrapper">
                                    <a class="add-to-cart-btn" href="#">
                                        Add to cart
                                    </a>
                                </div>
                            </div>
                        </div>
            @endforeach
        </div>
    </div>
        </div>
    </div>
</body>
</html>
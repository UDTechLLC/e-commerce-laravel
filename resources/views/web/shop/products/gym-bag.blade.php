@extends('web.layouts.app')
@section('title')
    {!! $product->title !!} -@parent
@endsection
@section('style')
    @parent
    <link rel="stylesheet" href="{{asset('web/css/product_custom.css')}}">
@endsection
@section('content')
    <main>
        <div class="top-product-description-block">
            <div class="wrapper">
                <div class="product-preview-wrapper">
                    <div class="image-wrapper">
                        {{--<img src="assets/images/full-product/product.png">--}}
                        <img src="{!! $product->getFirstMediaUrl('products') !!}" />
                    </div>
                </div>
                <div class="product-info-block">
                    <div class="product-info">
                        <div class="product-title-block">
                            <h2 class="product-title">
                                {{--Shedfat Infuser Bottle--}}
                                {!! $product->title !!}
                            </h2>
                        </div>
                        <div class="product-description-block">
                            <p class="product-description">
                                {{--Proper hydration is extremely important. It effects energy levels, performance and overall well-being.  Add flavor, increase the nutritional value and make staying hydrated and healthy a more enjoyable process.--}}
                                {!! $product->description !!}
                            </p>
                            <ul class="product-description-list check-icon-list">
                                @foreach($checkMark as $mark)
                                    <li class="product-description-list-item">
                                        <i class="fas fa-check"></i>
                                        {{$mark->title}}
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="product-price-block">
                            <div class="product-price has-old-price">
                                @if($product->old_amount)
                                    <span class="product-amount product-amount--old">
                                 <span class="currency">$</span>
                                        {{--<span>49.99</span>--}}
                                        <span>{{ $product->old_amount }}</span>
                            </span>
                                @endif
                                <span class="product-amount">
                                <span class="currency">$</span>
                                    {{--<span>29.99</span>--}}
                                    <span>{{ $product->amount }}</span>
                            </span>
                            </div>
                        </div>
                        @include('web.shop.partials.free_shipping')
                        @if($product->out_of_stock)
                            <div class="product-button-block">
                                <div class="add-to-cart-wrapper">
                                    <div class="product-button-block">
                                        <div class="add-to-cart-wrapper">
                                            <a class="disabled-button-product-page">
                                                Sold out
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @else
                            <add-to-cart
                                    product-slug="{{ $product->slug }}">
                            </add-to-cart>
                        @endif

                    </div>
                </div>
                <div class="clear"></div>
            </div>
        </div>

    </main>
    @if(!$product->out_of_stock)
        <add-to-cart-mobile
                product-slug="{{ $product->slug }}"
        >
        </add-to-cart-mobile>
    @endif

@endsection

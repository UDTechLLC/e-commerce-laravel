@extends('web.layouts.app')
@section('title')
    {!! $product->title !!} -@parent
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
                        <add-to-cart
                                product-slug="{{ $product->slug }}"
                        >
                        </add-to-cart>
                        @include('web.shop.partials.free_shipping')
                    </div>
                </div>
                <div class="clear"></div>
            </div>
        </div>

    </main>

    <add-to-cart-mobile
            product-slug="{{ $product->slug }}"
    >
    </add-to-cart-mobile>

@endsection
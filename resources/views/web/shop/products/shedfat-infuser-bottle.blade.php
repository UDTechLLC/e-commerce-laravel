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
                </div>
            </div>
            <div class="clear"></div>
        </div>
    </div>

    </main>


    <section class="get-more">
        <div class="wrapper">
            <div class="flex flex-a--center flex--m-block">
                <div class="get-more__img">
                    <img src="{{ asset('web/images/full-product/pr-get-more.png')}}" alt="pr-get-more">
                </div>
                <div class="get-more__text">
                    <img src="{{ asset('web/images/full-product/get-more.png')}}" alt="get-more">
                </div>
            </div>
        </div>
    </section>
    <add-to-cart-mobile
            product-slug="{{ $product->slug }}"
    >
    </add-to-cart-mobile>

    @endsection
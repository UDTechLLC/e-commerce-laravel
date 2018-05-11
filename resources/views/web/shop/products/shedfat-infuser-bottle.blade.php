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
                    <img src="{!! $product->getFirstMediaUrl('products') !!}" />
                </div>
            </div>
            <div class="product-info-block">
                <div class="product-info">
                    <div class="product-title-block">
                        <h2 class="product-title">
                            {!! $product->title !!}
                        </h2>
                    </div>
                    <div class="product-description-block">
                        <p class="product-description">
                            {!! $product->description !!}
                        </p>
                    </div>
                    <div class="product-price-block">
                        <div class="product-price has-old-price">
                            @if($product->old_amount)
                            <span class="product-amount product-amount--old">
                                 <span class="currency">$</span>
                                <span>{{ $product->old_amount }}</span>
                            </span>
                            @endif
                            <span class="product-amount">
                                <span class="currency">$</span>
                                <span>{{ $product->amount }}</span>
                            </span>
                        </div>
                    </div>
                    @include('web.shop.partials.free_shipping')
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
                @if($product->getFirstMedia('products')->getCustomProperty('view_video') != "")
                    <div class="video-block-wrapper">
                        <div class="custom-video-block"> <!--add class  'custom-video-block--red' for red border -->
                            <div class="custom-video-block__inner">

                                <div class="custom-video-block__wrapper-click">
                                    <img src="{{ asset('web/images/new-images/cap.png')}}" alt="mainImage"
                                         class="custom-video-block__coverImg">
                                    <img src="{{ asset('web/carouselengine/playvideo-64-64-0.png')}}" alt=""
                                         class="custom-video-block__playImg">
                                </div>


                                <iframe src="{{ $product->getFirstMedia('products')->getCustomProperty('view_video') }}"
                                        frameborder="0" webkitallowfullscreen mozallowfullscreen
                                        allowfullscreen></iframe>

                            </div><!--custom-video-block__inner-->

                        </div><!--custom-video-block-->
                    </div>

                @else
                    <div class="get-more__img get-more__img--red-border">
                        <img src="{{ asset('web/images/full-product/pr-get-more.png')}}" alt="pr-get-more">
                    </div>
                @endif
                <div class="get-more__text">
                    <img src="{{ asset('web/images/full-product/infuser_bottle_desktop.svg')}}" alt="get-more">
                </div>
            </div>
        </div>
    </section>
    <add-to-cart-mobile
            product-slug="{{ $product->slug }}"
    >
    </add-to-cart-mobile>

    @endsection
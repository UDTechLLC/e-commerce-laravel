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
                        {{--<img src="assets/images/full-product/resistance_bands.png">--}}
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
                <div class="video-block-wrapper">

                    <div class="custom-video-block"> <!--add class  'custom-video-block--red' for red border -->
                        <div class="custom-video-block__inner">

                            <div class="custom-video-block__wrapper-click">
                                <img src="{{ asset('web/images/new-images/cap.png')}}" alt="mainImage" class="custom-video-block__coverImg">
                                <img src="{{ asset('web/carouselengine/playvideo-64-64-0.png')}}" alt="" class="custom-video-block__playImg">
                            </div>


                            <iframe src="https://player.vimeo.com/video/261638450" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>

                        </div><!--custom-video-block__inner-->

                    </div><!--custom-video-block-->
                </div>
                <div class="get-more__text">
                    <img src="{{ asset('web/images/full-product/Press Play & follow along.svg')}}" alt="get-more">
                </div>
            </div>
        </div>
    </section>
    <add-to-cart-mobile
            product-slug="{{ $product->slug }}"
    >
    </add-to-cart-mobile>
@endsection
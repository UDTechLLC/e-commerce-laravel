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
                        <img src="{!! $product->getFirstMediaUrl('products') !!}"/>
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

    <section class="get-more">
        <div class="wrapper">
            <div class="flex flex-a--center flex--m-block">
                <div class="video-block-wrapper">
                    @if($product->getFirstMedia('products')->getCustomProperty('view_video') != "")
                        <div class="custom-video-block"> <!--add class  'custom-video-block--red' for red border -->
                            <div class="custom-video-block__inner">

                                <div class="custom-video-block__wrapper-click">
                                    <img src="{{ asset('web/images/610809299_640.jpg')}}" alt="mainImage"
                                         class="custom-video-block__coverImg">
                                    <img src="{{ asset('web/carouselengine/playvideo-64-64-0.png')}}" alt=""
                                         class="custom-video-block__playImg">
                                </div>


                                <iframe src="{{ $product->getFirstMedia('products')->getCustomProperty('view_video') }}"
                                        frameborder="0" webkitallowfullscreen mozallowfullscreen
                                        allowfullscreen></iframe>

                            </div><!--custom-video-block__inner-->

                        </div><!--custom-video-block-->
                    @endif
                </div>
                <div class="get-more__text">
                    <img src="{{ asset('web/images/full-product/text_images/1.svg')}}" alt="get-more">
                </div>
            </div>
        </div>
    </section>
    </main>
    @if(!$product->out_of_stock)
        <add-to-cart-mobile
                product-slug="{{ $product->slug }}"
        >
        </add-to-cart-mobile>
    @endif
@endsection

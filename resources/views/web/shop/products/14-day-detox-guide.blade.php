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
                    {{--<img src="assets/images/full-product/14-day-detox-guide/top_product_image.png">--}}
                    <img src="{!! $product->getFirstMediaUrl('products') !!}" />
                </div>
            </div>
            <div class="product-info-block">
                <div class="product-info">
                    <div class="product-title-block">
                        <h2 class="product-title custom-w">
                            {{--14 DAY DETOX SMOOTHIE--}}
                            {{--CLEANSE--}}
                            {!! $product->title !!}
                        </h2>
                    </div>
                    <div class="product-description-block">
                        <p class="product-description">
                            {{--The Power of Juice! This is the fast lane on the health highway. Whether you are looking to lose weight, boost mental function--}}
                            {{--or feel lighter on your feet juicing can help get you there!--}}
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

    <section class="section__wrapper detox-section">
        <div class="wrapper">
            <h2 class="section__title">WHY SHOULD I DETOX?</h2>
            <div class="flex flex-j--between detox-section__wrapper">
                <div class="detox-section__block">

                    <div class="inline-block">
                        <div class="detox-section__item">
                            <div class="section__icon-img">
                                <img src="{{ asset('web/images/full-product/14-day-detox-guide/icon-weight-loss.svg')}}" alt="icon-weight-loss">
                            </div>
                            <p class="section__info">Weight Loss</p>
                        </div>

                        <div class="detox-section__item">
                            <div class="section__icon-img">
                                <img src="{{ asset('web/images/full-product/14-day-detox-guide/improved-complexion.svg')}}" alt="improved-complexion">
                            </div>
                            <p class="section__info">
                                Improved <br>
                                Complexion
                            </p>
                        </div>
                        <div class="detox-section__item">
                            <div class="section__icon-img">
                                <img src="{{ asset('web/images/full-product/14-day-detox-guide/absorption.svg')}}" alt="absorption">
                            </div>
                            <p class="section__info">
                                More Efficient <br>
                                Nutrient <br> Absorption
                            </p>
                        </div>
                        <div class="detox-section__item">
                            <div class="section__icon-img">
                                <img src="{{ asset('web/images/full-product/14-day-detox-guide/enhanced-mood.svg')}}" alt="enhanced-mood">
                            </div>
                            <p class="section__info">
                                Enhanced Mood
                            </p>
                        </div>
                        <div class="detox-section__item">
                            <div class="section__icon-img">
                                <img src="{{ asset('web/images/full-product/14-day-detox-guide/increased-energy.svg')}}" alt="increased-energy">
                            </div>
                            <p class="section__info">
                                Increased Energy
                                Levels
                            </p>
                        </div>
                        <div class="detox-section__item">
                            <div class="section__icon-img">
                                <img src="{{ asset('web/images/full-product/14-day-detox-guide/improve-digestion.svg')}}" alt="improve-digestion">
                            </div>
                            <p class="section__info">
                                More Efficient
                                Digestion
                            </p>
                        </div>
                    </div>
                </div>
                <div class="detox-section__block detox-section__block--right">
                    <img src="{{ asset('web/images/full-product/14-day-detox-guide/why-detox.png')}}" alt="why-detox">
                </div>
            </div>
        </div>
    </section>

    <section class="grey-section section__wrapper">
        <div class="wrapper">
            <div class="flex flex-j--between flex--m-block">
                <div class="block-50 m-block-100">
                    <div class="section__img section__img--detox">
                        <img src="{{ asset('web/images/full-product/14-day-detox-guide/benefits.png')}}" alt="benefits">
                    </div>
                </div>
                <div class="block-50 m-block-100">
                    <h2 class="section__title section__title--detox">BENEFITS OF “14 DAY DETOX
                        SMOOTHIE CLEANSE”</h2>
                    <p class="section__text section__text--detox">
                        There are a million and one ways to improve your health and it
                        is easy to become overwhelmed by all of the what, where, when and why. Not anymore!
                        <br><br>
                        Our 14 Day Detox Smoothie Cleanse provides you with step by step instructions on an ALL NATURAL way to cleanse the body
                        and improve the way you look and feel. </p>
                </div>
            </div>
        </div>
    </section>



    <section>
        <div class="training-plan-faqs-block-wrapper">
            <div class="wrapper">

                <div class="flex flex-a--center flex--m-block detox-section__wrapperVideo">


                    <div class="get-more__text">
                        <img src="{{ asset('web/images/full-product/14-day-detox-guide/refresh-and-reset.png')}}" alt="get-more">
                    </div>

                    {{--<div class="video-block-wrapper">--}}
                        {{--<div class="video-block">--}}
                            {{--<div id="amazingcarousel-container-1">--}}
                                {{--<div id="amazingcarousel-1" style="display: block; position: relative; width: 100%; max-width: 990px; margin: 0px auto; direction: ltr;">--}}
                                    {{--<div class="amazingcarousel-list-container" style="position: relative; margin: 0px auto; overflow: visible;">--}}
                                        {{--<div class="amazingcarousel-list-wrapper" style="overflow: hidden;"><div class="amazingcarousel-list-wrapper" style="overflow: hidden;"><ul class="amazingcarousel-list" style="display: block; position: relative; list-style-type: none; list-style-image: none; background-image: none; background-color: transparent; padding: 0px; margin: 0px;">--}}
                                                    {{--<li class="amazingcarousel-item amazingcarousel-item-0" style="display: block; position: relative; background-image: none; background-color: transparent; margin: 0px; padding: 0px; float: left;">--}}
                                                        {{--<div class="amazingcarousel-item-container" style="position: relative; margin: 0px 4px;">--}}
                                                            {{--<div class="amazingcarousel-image border-red">--}}
                                                                {{--<a href="https://player.vimeo.com/video/230763222" title="Rauve workout plan GYM" class="html5lightbox" data-group="amazingcarousel-1"><img src="{{ asset('web/images/full-product/14-day-detox-guide/651403317_640.jpg')}}" alt="Rauve workout plan GYM"></a>--}}
                                                                {{--<div class="amazingcarousel-play-video" style="position:absolute;left:0;top:0;width:100%;height:100%;cursor:pointer;background-image:url('/assets/carouselengine/playvideo-64-64-0.png');background-repeat:no-repeat;background-position:center center;"></div><div class="amazingcarousel-play-video" style="position:absolute;left:0;top:0;width:100%;height:100%;cursor:pointer;background-image:url('http://localhost:5000/assets/carouselengine/playvideo-64-64-0.png');background-repeat:no-repeat;background-position:center center;"></div></div>--}}
                                                        {{--</div>--}}
                                                    {{--</li>--}}
                                                    {{--<div style="clear:both;"></div><div style="clear:both;"></div></ul></div></div>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    <div class="video-block-wrapper">

                        <div class="custom-video-block custom-video-block--red"> <!--add class  'custom-video-block--red' for red border -->
                            <div class="custom-video-block__inner">

                                <div class="custom-video-block__wrapper-click">
                                    <img src="{{ asset('web/images/full-product/14-day-detox-guide/651403317_640.jpg')}}" alt="mainImage" class="custom-video-block__coverImg">
                                    <img src="{{ asset('web/carouselengine/playvideo-64-64-0.png')}}" alt="" class="custom-video-block__playImg">
                                </div>


                                <iframe src="https://player.vimeo.com/video/230763222" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>

                            </div><!--custom-video-block__inner-->

                        </div><!--custom-video-block-->
                    </div>





                </div>



                <div class="training-plan-faqs-block">


                </div>
                <div class="clear"></div>
            </div>
        </div>
    </section>

</main>


<add-to-cart-mobile
        product-slug="{{ $product->slug }}"
>
</add-to-cart-mobile>

    @endsection
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
                        <img src="{!! $product->getFirstMediaUrl('products') !!}"/>
                    </div>
                </div>
                <div class="product-info-block">
                    <div class="product-info">
                        <div class="product-title-block">
                            <h2 class="product-title custom-w">
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

        <section class="section__wrapper detox-section">
            <div class="wrapper">
                <h2 class="section__title">WHY SHOULD I DETOX?</h2>
                <div class="flex flex-j--between detox-section__wrapper">
                    <div class="detox-section__block">

                        <div class="inline-block">
                            <div class="detox-section__item">
                                <div class="section__icon-img">
                                    <img src="{{ asset('web/images/full-product/14-day-detox-guide/icon-weight-loss.svg')}}"
                                         alt="icon-weight-loss">
                                </div>
                                <p class="section__info">Weight Loss</p>
                            </div>

                            <div class="detox-section__item">
                                <div class="section__icon-img">
                                    <img src="{{ asset('web/images/full-product/14-day-detox-guide/improved-complexion.svg')}}"
                                         alt="improved-complexion">
                                </div>
                                <p class="section__info">
                                    Improved <br>
                                    Complexion
                                </p>
                            </div>
                            <div class="detox-section__item">
                                <div class="section__icon-img">
                                    <img src="{{ asset('web/images/full-product/14-day-detox-guide/absorption.svg')}}"
                                         alt="absorption">
                                </div>
                                <p class="section__info">
                                    More Efficient <br>
                                    Nutrient <br> Absorption
                                </p>
                            </div>
                            <div class="detox-section__item">
                                <div class="section__icon-img">
                                    <img src="{{ asset('web/images/full-product/14-day-detox-guide/enhanced-mood.svg')}}"
                                         alt="enhanced-mood">
                                </div>
                                <p class="section__info">
                                    Enhanced Mood
                                </p>
                            </div>
                            <div class="detox-section__item">
                                <div class="section__icon-img">
                                    <img src="{{ asset('web/images/full-product/14-day-detox-guide/increased-energy.svg')}}"
                                         alt="increased-energy">
                                </div>
                                <p class="section__info">
                                    Increased Energy
                                    Levels
                                </p>
                            </div>
                            <div class="detox-section__item">
                                <div class="section__icon-img">
                                    <img src="{{ asset('web/images/full-product/14-day-detox-guide/improve-digestion.svg')}}"
                                         alt="improve-digestion">
                                </div>
                                <p class="section__info">
                                    More Efficient
                                    Digestion
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="detox-section__block detox-section__block--right">
                        <img src="{{ asset('web/images/full-product/14-day-detox-guide/why-detox.png')}}"
                             alt="why-detox">
                    </div>
                </div>
            </div>
        </section>

        <section class="grey-section section__wrapper">
            <div class="wrapper">
                <div class="flex flex-j--between flex--m-block">
                    <div class="block-50 m-block-100">
                        <div class="section__img section__img--detox">
                            <img src="{{ asset('web/images/full-product/14-day-detox-guide/benefits.png')}}"
                                 alt="benefits">
                        </div>
                    </div>
                    <div class="block-50 m-block-100">
                        <h2 class="section__title section__title--detox">BENEFITS OF “14 DAY DETOX
                            SMOOTHIE CLEANSE”</h2>
                        <p class="section__text section__text--detox">
                            There are a million and one ways to improve your health and it
                            is easy to become overwhelmed by all of the what, where, when and why. Not anymore!
                            <br><br>
                            Our 14 Day Detox Smoothie Cleanse provides you with step by step instructions on an ALL
                            NATURAL way to cleanse the body
                            and improve the way you look and feel. </p>
                    </div>
                </div>
            </div>
        </section>
        <section>
            <div class="training-plan-faqs-block-wrapper">
                <div class="wrapper">

                    <div class="flex flex-a--center flex--m-block">


                        <div class="video-block-wrapper">
                            @if($product->getFirstMedia('products')->getCustomProperty('view_video') != "")
                                <div class="custom-video-block custom-video-block--red">
                                    <!--add class  'custom-video-block--red' for red border -->
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
                            @endif
                        </div>

                        <div class="get-more__text">
                            <img src="{{ asset('web/images/full-product/text_images/2.svg')}}"
                                 alt="get-more">
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
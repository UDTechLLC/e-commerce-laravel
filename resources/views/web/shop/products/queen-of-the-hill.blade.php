@extends('web.layouts.app')
@section('title')
    {!! $product->title !!} -@parent
@endsection
@section('content')
    <main>

        <div class="top-product-description-block triangle-bottom triangle-bottom--large">
            <div class="wrapper">
                <div class="product-preview-wrapper">
                    <div class="image-wrapper">
                        {{--<img src="{{ asset('web/images/full-product/queen-of-the-hill/ipad-90days.png')}}" alt="ipad-90days">--}}
                        <img src="{!! $product->getFirstMediaUrl('products') !!}" alt="ipad-90days">
                    </div>
                </div>
                <div class="product-info-block">
                    <div class="product-info">
                        <div class="product-title-block">
                            <h2 class="product-title">
                                {{ $product->title }}
                            </h2>
                        </div>
                        <div class="product-description-block">
                            <p class="product-description">
                                {!!  $product->description !!}
                                {{--You do not need to spend hundreds of dollars on a personal trainer to get the results that you are after! All of the guidance that you need is right here in our 90 Day, total body, gym based program. It can be accessed at any time from any smart device! </p>--}}
                            </div>
                            <div class="product-price-block border-top border-top--grey">
                                <div class="product-price has-old-price">
                                    @if($product->old_amount)
                                        <span class="product-amount product-amount--old">
                                    <span class="currency">$</span>
                                    <span>{{ $product->old_amount }}</span>
                                </span>
                                    @endif
                                    <span class="product-amount">
                                    <span class="currency">$</span>
                                        {{--<span>50.00</span>--}}
                                        <span>{{ $product->amount }}</span>
                                </span>
                                </div>
                            </div>
                            <add-to-cart
                                    product-slug="{{ $product->slug }}"
                                    {{--data-title="12 Week Custom Meal Plan"--}}
                            >
                            </add-to-cart>
                        </div>
                    </div>
                    <div class="clear"></div>
                </div>
            </div>
            <section class="section__wrapper queen-of-the-hill__bg" style="background-image:url({{ asset('web/images/full-product/queen-of-the-hill/bg.png') }})">
                <div class="wrapper">
                    <h2 class="section__title after-lines after-lines--large text-center">
                        90 DAY GUIDE TO <br>
                        A STRONG AND SEXY FIGURE
                    </h2>
                    <p class="section__text">
                        QUEEN OF THE HILL is our all-encompassing guide to achieving the body that you have always wanted.
                        After the first 6 weeks, the program changes, keeping it fun and effective! Use it to ensure that
                        your time in the gym is optimized and your results are maximized!
                    </p>

                    <div class="section__img">
                        <img src="{{ asset('web/images/full-product/queen-of-the-hill/book@2x-2.png')}}" alt="book"
                             class="full-width desktop-image"/>
                        <img src="{{ asset('web/images/full-product/queen-of-the-hill/book_mob@2x-1.png')}}" alt="book"
                             class="full-width mobile-image"/>
                    </div>

                    <div class="section__icons inline-block text-center">
                        {{--<div class="section__icon-wrapper">--}}
                        {{--<div class="section__icon-img flex flex-a--center flex-j--center">--}}
                        {{--<img src="{{ asset('web/images/full-product/queen-of-the-hill/full_weekly.svg')}}" alt="">--}}
                        {{--</div>--}}
                        {{--<div class="text-center">--}}
                        {{--<h3 class="section__icon-text">--}}
                        {{--FULL WEEKLY BREAK DOWN--}}
                        {{--</h3>--}}
                        {{--<p class="section__icon-info">--}}
                        {{--What to do and when to do it!--}}
                        {{--</p>--}}
                        {{--</div>--}}
                        {{--</div>--}}
                        {{--<div class="section__icon-wrapper">--}}
                        {{--<div class="section__icon-img flex flex-a--center flex-j--center">--}}
                        {{--<img src="{{ asset('web/images/full-product/queen-of-the-hill/icon_Get-Toned-1.svg')}}" alt="">--}}
                        {{--</div>--}}
                        {{--<div class="text-center">--}}
                        {{--<h3 class="section__icon-text">--}}
                        {{--GET TONED--}}
                        {{--</h3>--}}
                        {{--<p class="section__icon-info">--}}
                        {{--We concentrate on fat loss over weight loss--}}
                        {{--</p>--}}
                        {{--</div>--}}
                        {{--</div>--}}
                        {{--<div class="section__icon-wrapper">--}}
                        {{--<div class="section__icon-img flex flex-a--center flex-j--center">--}}
                        {{--<img src="{{ asset('web/images/full-product/queen-of-the-hill/recovery.svg')}}" alt="">--}}
                        {{--</div>--}}
                        {{--<div class="text-center">--}}
                        {{--<h3 class="section__icon-text">--}}
                        {{--RECOVERY TIPS--}}
                        {{--</h3>--}}
                        {{--<p class="section__icon-info">--}}
                        {{--Rest allows the body to change--}}
                        {{--</p>--}}
                        {{--</div>--}}
                        {{--</div>--}}


                    </div>


                </div>
            </section>
            <div class="training-plan-faqs-block-wrapper">
                <div class="wrapper">
                    <div class="video-block-wrapper">

                        @if($product->getFirstMedia('products')->getCustomProperty('view_video') != "")
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
                        @endif
                    </div>
                    <div class="training-plan-faqs-block">
                        <h4 class="training-plan-faqs-title">
                            FAQS
                        </h4>
                        <ul class="training-plan-faqs-list">
                            <li class="training-plan-faqs-list-item">
                                <p class="item-title">
                                    <strong>
                                        Is this program to advanced for me?
                                    </strong>
                                </p>
                                <p class="item-description">
                                    NO! This is a progressive program that has been designed to improve upon any fitness
                                    level.
                                </p>
                            </li>
                            <li class="training-plan-faqs-list-item">
                                <p class="item-title">
                                    <strong>
                                        I do not want to spend 2 hours in the gym!
                                    </strong>
                                </p>
                                <p class="item-description">
                                    With this guide, you will be able to complete comprehensive and extremely effective
                                    workouts in less than an hour.
                                </p>
                            </li>
                            <li class="training-plan-faqs-list-item">
                                <p class="item-title">
                                    <strong>
                                        Is this a program that I can complete more than once?
                                    </strong>
                                </p>
                                <p class="item-description">
                                    Absolutely! The guide can be completed once, twice...ten times through. Each successful
                                    completion of the program will make you better than the last.
                                </p>
                            </li>
                        </ul>
                    </div>
                    <div class="clear"></div>
                </div>
            </div>
            {{--<section class="parallax-section parallax-section--queen-of-the-hill" data-speed=".7" data-size="100vw" data-parallax="scroll" data-image-src="{{ asset('web/images/full-product/parallax/maximize_bg.jpg')}}" data-relative-input="true">--}}

            {{--<div class="wrapper">--}}
            {{--<h2 class="section__title section__title--white after-lines after-lines--large after-lines--red text-center section__title--what-eat">--}}
            {{--MAXIMIZE YOUR RESULTS--}}
            {{--</h2>--}}
            {{--<p class="section__text section__text--white text-center">Combine Queen Of The Hill and our Custom Meal Plan to achieve greater results</p>--}}


            {{--<div class="block-in-section-wrapper flex flex-j--between">--}}
            {{--<div class="block-in-section  block-in-section--40 text-center">--}}
            {{--<img src="{{ asset('web/images/full-product/queen-of-the-hill/product_icon.png')}}" alt="product_icon">--}}
            {{--<img src="{!! $product->bandls->getFirstMediaUrl('products') !!}" />--}}
        {{--</div>--}}
        {{--<div class="block-in-section block-in-section--60">--}}
        {{--<h2 class="parallax-section__title  parallax-section__title--red" style="text-transform: uppercase;">--}}
        {{--12 WEEK CUSTOM MEAL PLAN--}}
        {{--{!! $product->bandls->title !!}--}}
        {{--</h2>--}}
        {{--<h4 class="parallax-section__subTitle parallax-section__subTitle--white">100% Personalized Meal Plan</h4>--}}
        {{--<p class="parallax-section__info parallax-section__info--white">--}}
        {{--Training is important but nutrition is what can make or break you! Our dedicated team knows that reaching any health and fitness goal starts with a solid nutrition plan. We do want not look at this as a diet, we want you to look at this as an opportunity to lay a strong foundation for years to come. That is why we offer various meal plan options that can be tailored to any lifestyle.--}}
        {{--</p>--}}
        {{--<ul class="parallax-section__list parallax-section__list--white">--}}
        {{--<li>Intermittent Fasting</li>--}}
        {{--<li>Ketogenic</li>--}}
        {{--<li>Carb Cycling</li>--}}
        {{--<li>Vegan/Vegetarian</li>--}}
        {{--</ul>--}}
        {{--<div class="product-price-block">--}}
        {{--<div class="product-price has-old-price">--}}
        {{--<span class="product-amount product-amount--old product-amount--white">--}}
        {{--<span class="currency">$</span>--}}
        {{--<span> {!! $product->bandls->old_amount !!}</span>--}}
        {{--</span>--}}
        {{--<span class="product-amount">--}}
        {{--<span class="currency">$</span>--}}
        {{--<span> {!! $product->bandls->amount !!}</span>--}}
        {{--</span>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--product-slug="{{ $product->bandls->slug }}"--}}
        {{--<add-to-cart--}}
        {{--product-slug="{{ $product->slug }}"--}}
        {{--product-bundle-slug="{{ $product->bandls->slug }}"--}}
        {{--></add-to-cart>--}}
        {{--</div>--}}
        {{--</div>--}}

        {{--</div>--}}
        {{--</section>--}}


    </main>
    <div class="popUp" data-modal="12 Week Custom Meal Plan"><!-- popUp--open -->
        <div class="popUp__wrapper">
            <button type="button" class="popUp__close" data-dismiss="modal">×</button>
            <h2 class="popUp__title">MAXIMIZE YOUR RESULTS</h2>
            <p class="popUp__subTitle">Combine Queen Of The Hill and our Custom Meal Plan to achieve greater results</p>
            <div class="popUp__img-info">
                <div class="popUp__img">
                    <img src="{{asset('web/images/full-product/queen-of-the-hill/queen+12week.png')}}"
                         alt="product_icon">
                </div>
                <div class="popUp__info">
                    <div class="popUp__name">12 Week Custom Meal Plan</div>
                    <p class="popUp__description">Training is only 20% of the battle. 80% of results come from
                        consistent and proper nutrition!</p>

                    <div class="popUp__productPriceBlock">

                        <div class="product-amount">
                            <div class="flex flex-a--center">
                                <div class="old-price line-throw">
                                    <span class="currency">$</span>
                                    <span>{{ $product->bandls->old_amount }}</span>
                                </div>
                                <div class="product-price">
                                    <span class="currency">$</span>
                                    <span>{{ $product->bandls->amount }}</span>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="btns-add-to-thanks flex flex-a--center flex-j--between">
                        <add-to-cart
                                product-slug="{{ $product->bandls->slug }}"
                        >
                        </add-to-cart>
                        {{--<a href="#" class="btn add-to-cart-btn">ADD TO CART</a>--}}
                        <a href="#" class="no-thanks">NO, THANKS</a>
                    </div>
                    <a href="#" class="learn-more">learn more</a>

                </div>
            </div>
        </div>
    </div>

    <add-to-cart-mobile
            product-slug="{{ $product->slug }}"
    >
    </add-to-cart-mobile>

@endsection

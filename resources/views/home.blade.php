@extends('web.layouts.app')
@section('title')
    Weight Loss Teas | Detox Tea For Weight Loss | Nutrition Programs -@parent
@endsection
@section('content')
<main class="home">
    <div class="top-home-banner-block-wrapper">
        <div class="top-home-banner-block">
            <div class="main-product">
                <a href="{{url('product/bogo-12-week-custom-meal-plan')}}">
                    <img class="desktop-image" src="{{ asset('web/images/home_page/top_banner/banner_12_week_custom_plan (3).jpg')}}" />
                    <img class="mobile-image" src="{{ asset('web/images/home_page/top_banner/mobile/banner_12_week_custom_plan_mob (1).jpg')}}">
                </a>
            </div>
            <div class="secondary-products">
                <div class="tabs-flex">
                    <a class="top" href="{{url('product/queen-of-the-hill')}}">
                        <img class="desktop-image" src="{{ asset('web/images/new-images/queen_of_the_hill_banner.jpg')}}" />
                        <img class="mobile-image" src="{{ asset('web/images/home_page/top_banner/mobile/mobile_2.jpg')}}">
                    </a>
                    <a class="bottom" href="{{url('product/shedfat-maxx')}}">
                        <img class="desktop-image" src="{{ asset('web/images/new-images/shedfat_max.jpg')}}" />
                        <img class="mobile-image" src="{{ asset('web/images/home_page/top_banner/mobile/mobile_3.jpg')}}">
                    </a>
                </div>
            </div>
            <div class="clear"></div>
        </div>
    </div>
    <div class="success-stories-block-wrapper">
        <div class="wrapper">
            <div class="success-stories-block">
                <div class="separate-heading-block">
                    <div class="title-sep-container title-sep-container-left">
                        <div class="title-sep sep-single"></div>
                    </div>
                    <h2 class="separate-heading-title custom-plan-title">
                        SUCCESS STORIES
                    </h2>
                    <div class="title-sep-container title-sep-container-right">
                        <div class="title-sep sep-single"></div>
                    </div>
                </div>
                <div class="success-story-slider-wrapper">
                    <div id="successStories" class="success-story-slider">
                        <div class="slider-item">
                            <img src="{{ asset('web/images/home_page/slider/1.jpg')}}" />
                        </div>
                        <div class="slider-item">
                            <img src="{{ asset('web/images/home_page/slider/2.jpg')}}" />
                        </div>
                        <div class="slider-item">
                            <img src="{{ asset('web/images/home_page/slider/3.jpg')}}" />
                        </div>
                        <div class="slider-item">
                            <img src="{{ asset('web/images/home_page/slider/4.jpg')}}" />
                        </div>
                        <div class="slider-item">
                            <img src="{{ asset('web/images/home_page/slider/5.jpg')}}" />
                        </div>
                        <div class="slider-item">
                            <img src="{{ asset('web/images/home_page/slider/6.jpg')}}" />
                        </div>
                        <div class="slider-item">
                            <img src="{{ asset('web/images/home_page/slider/7.jpg')}}" />
                        </div>
                        <div class="slider-item">
                            <img src="{{ asset('web/images/home_page/slider/8.jpg')}}" />
                        </div>
                        <div class="slider-item">
                            <img src="{{ asset('web/images/home_page/slider/9.jpg')}}" />
                        </div>
                        <div class="slider-item">
                            <img src="{{ asset('web/images/home_page/slider/10.jpg')}}" />
                        </div>
                        <div class="slider-item">
                            <img src="{{ asset('web/images/home_page/slider/11.jpg')}}" />
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="shop-now-block-wrapper">
        <div class="wrapper">
            <div class="shop-now-block">
                <h2 class="shop-now-title">
                    Shop Now
                </h2>
                <p class="shop-now-sub-title">
                    Start Your Transformation Today
                </p>
                <div class="shop-now-button-wrapper">
                    <a class="shop-now-button" href="{{url('/shop')}}">
                        Enter the store
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="success-stories-block-wrapper main-youtube-feed">
        <div class="wrapper">
            <div class="success-stories-block">
                <div class="separate-heading-block">
                    <div class="title-sep-container title-sep-container-left">
                        <div class="title-sep sep-single"></div>
                    </div>
                    <h2 class="separate-heading-title custom-plan-title">
                        YOUTUBE FEED
                    </h2>
                    <div class="title-sep-container title-sep-container-right">
                        <div class="title-sep sep-single"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="wrapper">
            <div class="iframe-wrapper">
                <iframe src="https://www.youtube.com/embed/PbX8MS8AOsI" frameborder="0"  allowfullscreen></iframe>
                <iframe src="https://www.youtube.com/embed/x111jJxQ-9w" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                <iframe src="https://www.youtube.com/embed/iMwwi9-dgPk" frameborder="0"  allowfullscreen></iframe>
            </div>
        </div>
    </div>
    <div class="subscribe">
        <div class="wrapper">
            <form action="{{ route('subscribe.footer') }}" class="subscribe__form" method="POST">
                {{ csrf_field() }}
                <h2 class="subscribe__title">Be part of our community</h2>
                <input type="email" name="email" required placeholder="Enter your email">
                <button class="btn subscribe__btn">Join Now</button>
            </form>
        </div>
    </div>
</main>
@endsection

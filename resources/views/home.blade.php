@extends('web.layouts.app')
@section('content')
<main class="home">
    <div class="top-home-banner-block-wrapper">
        <div class="top-home-banner-block">
            <div class="main-product">
                <a href="{{url('product/12week-custom-meal-plan')}}">
                    <img class="desktop-image" src="{{ asset('web/images/home_page/top_banner/banner_12_week_custom_plan.jpg')}}" />
                    <img class="mobile-image" src="{{ asset('web/images/home_page/top_banner/mobile/banner_12_week_custom_plan_mob.jpg')}}">
                </a>
            </div>
            <div class="secondary-products">
                <div class="tabs-flex">
                    <a class="top" href="#">
                        <img class="desktop-image" src="{{ asset('web/images/home_page/top_banner/desktop_2.jpg')}}" />
                        <img class="mobile-image" src="{{ asset('web/images/home_page/top_banner/mobile/mobile_2.jpg')}}">
                    </a>
                    <a class="bottom" href="{{url('product/shedfat-maxx')}}">
                        <img class="desktop-image" src="{{ asset('web/images/home_page/top_banner/desktop_3.jpg')}}" />
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
                            <img src="{{ asset('web/images/full-product/12_week_custom_meal_plan/slider_images/IMG_1.jpg')}}" />
                        </div>
                        <div class="slider-item">
                            <img src="{{ asset('web/images/full-product/12_week_custom_meal_plan/slider_images/IMG_2.jpg')}}" />
                        </div>
                        <div class="slider-item">
                            <img src="{{ asset('web/images/full-product/12_week_custom_meal_plan/slider_images/IMG_3.jpg')}}" />
                        </div>
                        <div class="slider-item">
                            <img src="{{ asset('web/images/full-product/12_week_custom_meal_plan/slider_images/IMG_4.jpg')}}" />
                        </div>
                        <div class="slider-item">
                            <img src="{{ asset('web/images/full-product/12_week_custom_meal_plan/slider_images/IMG_5.jpg')}}" />
                        </div>
                        <div class="slider-item">
                            <img src="{{ asset('web/images/full-product/12_week_custom_meal_plan/slider_images/IMG_6.jpg')}}" />
                        </div>
                        <div class="slider-item">
                            <img src="{{ asset('web/images/full-product/12_week_custom_meal_plan/slider_images/IMG_7.jpg')}}" />
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
</main>
@endsection

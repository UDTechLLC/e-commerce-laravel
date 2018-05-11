@extends('web.layouts.app')
@section('title')
    {!! $product->title !!} -@parent
@endsection
@section('content')
    <main>
        <div class="main">
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
                                <p class="product-title-sub-line">
                                    {{$product->sub_title}}
                                </p>
                            </div>
                            <div class="product-description-block">
                                <p class="product-description">
                                    {!! $product->description !!}
                                </p>
                                <ul class="product-description-list check-icon-list">
                                    <li class="product-description-list-item">
                                        <i class="fas fa-check"></i>
                                        Fat Loss and Toning
                                    </li>
                                    <li class="product-description-list-item">
                                        <i class="fas fa-check"></i>
                                        Muscle Building
                                    </li>
                                    <li class="product-description-list-item">
                                        <i class="fas fa-check"></i>
                                        Boost Energy Levels
                                    </li>
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
                            <add-to-cart
                                    product-slug="{{ $product->slug }}"
                                    data-title="{{ $product->title }}"
                            >
                            </add-to-cart>
                        </div>
                    </div>
                    <div class="clear"></div>
                </div>
            </div>
            <div class="training-plan-faqs-block-wrapper">
                <div class="wrapper">
                    <div class="video-block-wrapper">
                        @if($product->getFirstMedia('products')->getCustomProperty('view_video') != "")
                        <div class="custom-video-block"> <!--add class  'custom-video-block--red' for red border -->
                            <div class="custom-video-block__inner">

                                <div class="custom-video-block__wrapper-click">
                                    <img src="{{ asset('web/images/197577248.jpg')}}" alt="mainImage"
                                         class="custom-video-block__coverImg">
                                    <img src="{{ asset('web/carouselengine/playvideo-64-64-0.png')}}" alt=""
                                         class="custom-video-block__playImg">
                                </div>


                                <iframe src="{{ $product->getFirstMedia('products')->getCustomProperty('view_video') }}" frameborder="0"
                                        webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
                            </div><!--custom-video-block__inner-->

                        </div><!--custom-video-block-->
                        @endif
                    </div>


                    <div class="training-plan-faqs-block">
                        <h4 class="training-plan-faqs-title">
                            Training Plan FAQs
                        </h4>
                        <ul class="training-plan-faqs-list">
                            <li class="training-plan-faqs-list-item">
                                <p class="item-title">
                                    <strong>
                                        Do I need Workout Equipment?
                                    </strong>
                                </p>
                                <p class="item-description">
                                    No, we will help you work with what you’ve got!
                                </p>
                            </li>
                            <li class="training-plan-faqs-list-item">
                                <p class="item-title">
                                    <strong>
                                        I have never worked out before, is this for me?
                                    </strong>
                                </p>
                                <p class="item-description">
                                    Yes, no matter your age or experience level!
                                </p>
                            </li>
                            <li class="training-plan-faqs-list-item">
                                <p class="item-title">
                                    <strong>
                                        I am always on the go, how much time do I need to dedicate?
                                    </strong>
                                </p>
                                <p class="item-description">
                                    That’s fine, amazing results can be achieved with a little time and consistency!
                                </p>
                            </li>
                        </ul>
                    </div>
                    <div class="clear"></div>
                </div>
            </div>
            <div class="custom-plan-block-wrapper">
                <div class="wrapper">
                    <div class="custom-plan-block">
                        <div class="separate-heading-block">
                            <div class="title-sep-container title-sep-container-left">
                                <div class="title-sep sep-single"></div>
                            </div>
                            <h2 class="separate-heading-title custom-plan-title">
                                CUSTOM WORKOUT PROGRAM
                            </h2>
                            <div class="title-sep-container title-sep-container-right">
                                <div class="title-sep sep-single"></div>
                            </div>
                        </div>
                        <div class="custom-plan-content">
                            <div class="custom-plan-image-block">
                                <div class="image-wrapper">
                                    <img src="{{ asset('web/images/custom-training-program.png') }}"/>
                                </div>
                            </div>
                            <div class="custom-plan-description-block">
                                <ul class="custom-plan-description-list">
                                    <li class="custom-plan-description-list-item">
                                        <div class="item-icon-wrapper">
                                            <img src="{{ asset('web/images/workout-program-1.svg') }}"/>
                                        </div>
                                        <div class="item-content">
                                            <h3 class="item-title">
                                                100% TAILORED
                                            </h3>
                                            <p class="item-text">
                                                TO YOUR BODY AND GOALS
                                            </p>
                                        </div>
                                        <div class="clear"></div>
                                    </li>
                                    <li class="custom-plan-description-list-item">
                                        <div class="item-icon-wrapper">
                                            <img src="{{asset('web/images/workout-program-2.svg')}}"/>
                                        </div>
                                        <div class="item-content">
                                            <h3 class="item-title">
                                                20+ WAYS TO TRAIN
                                            </h3>
                                            <p class="item-text">
                                                AT HOME, HIIT, TABATA, ETC.
                                            </p>
                                        </div>
                                        <div class="clear"></div>
                                    </li>
                                    <li class="custom-plan-description-list-item">
                                        <div class="item-icon-wrapper">
                                            <img src="{{asset('web/images/workout-program-3.svg')}}"/>
                                        </div>
                                        <div class="item-content">
                                            <h3 class="item-title">
                                                WARM-UP TIPS
                                            </h3>
                                            <p class="item-text">
                                                TO KEEP YOU SAFE
                                            </p>
                                        </div>
                                        <div class="clear"></div>
                                    </li>
                                </ul>
                            </div>
                            <div class="clear"></div>
                        </div>
                    </div>
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
                                    <img src="{{ asset('web/images/success_story_slider/1/IMG_5611.jpg')}}"/>
                                </div>
                                <div class="slider-item">
                                    <img src="{{ asset('web/images/success_story_slider/1/IMG_2421.jpg')}}"/>
                                </div>
                                <div class="slider-item">
                                    <img src="{{ asset('web/images/success_story_slider/1/IMG_2810.jpg')}}"/>
                                </div>
                                <div class="slider-item">
                                    <img src="{{ asset('web/images/success_story_slider/1/IMG_7519.jpg')}}"/>
                                </div>
                                <div class="slider-item">
                                    <img src="{{ asset('web/images/success_story_slider/1/IMG_6252.jpg')}}"/>
                                </div>
                                <div class="slider-item">
                                    <img src="{{ asset('web/images/success_story_slider/1/IMG_2811.jpg')}}"/>
                                </div>
                                <div class="slider-item">
                                    <img src="{{ asset('web/images/success_story_slider/1/IMG_9363.jpg')}}"/>
                                </div>
                                <div class="slider-item">
                                    <img src="{{ asset('web/images/success_story_slider/1/IMG_4745.jpg')}}"/>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="customer-review-block-wrapper">
                <div class="wrapper">
                    <div class="customer-review-block">
                        <div class="separate-heading-block">
                            <div class="title-sep-container title-sep-container-left">
                                <div class="title-sep sep-single"></div>
                            </div>
                            <h2 class="separate-heading-title custom-plan-title">
                                CUSTOMER REVIEW
                            </h2>
                            <div class="title-sep-container title-sep-container-right">
                                <div class="title-sep sep-single"></div>
                            </div>
                        </div>
                        <div class="customer-reviews-wrapper">
                            <div class="customer-preview-single-block">
                                <div class="star-rating-wrapper">
                                    <ul class="star-rating">
                                        <li class="single-star-wrapper">
                                            <img src="{{ asset('web/images/icon-star.svg')}}"/>
                                        </li>
                                        <li class="single-star-wrapper">
                                            <img src="{{ asset('web/images/icon-star.svg')}}"/>
                                        </li>
                                        <li class="single-star-wrapper">
                                            <img src="{{ asset('web/images/icon-star.svg')}}"/>
                                        </li>
                                        <li class="single-star-wrapper">
                                            <img src="{{ asset('web/images/icon-star.svg')}}"/>
                                        </li>
                                        <li class="single-star-wrapper">
                                            <img src="{{ asset('web/images/icon-star.svg')}}"/>
                                        </li>
                                    </ul>
                                    <div class="clear"></div>
                                </div>
                                <h5 class="cr-title">
                                    “I can stream them on any device”
                                </h5>
                                <p class="cr-content">
                                    I travel all around the world for work, so sticking to a routine and exercise plan
                                    is hard for me. Until I found the Total Body Burn program. The best thing is I can
                                    stream them on any device and just workout in my hotel room if there is no gym
                                    accessible. I stick to a workout plan and continue to see results*
                                </p>
                            </div>
                            <div class="customer-preview-single-block">
                                <div class="star-rating-wrapper">
                                    <ul class="star-rating">
                                        <li class="single-star-wrapper">
                                            <img src="{{ asset('web/images/icon-star.svg')}}"/>
                                        </li>
                                        <li class="single-star-wrapper">
                                            <img src="{{ asset('web/images/icon-star.svg')}}"/>
                                        </li>
                                        <li class="single-star-wrapper">
                                            <img src="{{ asset('web/images/icon-star.svg')}}"/>
                                        </li>
                                        <li class="single-star-wrapper">
                                            <img src="{{ asset('web/images/icon-star.svg')}}"/>
                                        </li>
                                        <li class="single-star-wrapper">
                                            <img src="{{ asset('web/images/icon-star.svg')}}"/>
                                        </li>
                                    </ul>
                                    <div class="clear"></div>
                                </div>
                                <h5 class="cr-title">
                                    “I’ve lost 15 pounds the first 30 days”
                                </h5>
                                <p class="cr-content">
                                    This is my second round on Total Body Burn and I’m still loving it. I’ve lost 15
                                    pounds the first 30 days and inches too. My husband noticed the changes and decided
                                    he wanted to join in as well. Now we look forward to completing the challenge of the
                                    day. It has become our routine and he is seeing changes too!*
                                </p>
                            </div>
                            <div class="clear"></div>
                            <div class="customer-preview-single-block">
                                <div class="star-rating-wrapper">
                                    <ul class="star-rating">
                                        <li class="single-star-wrapper">
                                            <img src="{{ asset('web/images/icon-star.svg')}}"/>
                                        </li>
                                        <li class="single-star-wrapper">
                                            <img src="{{ asset('web/images/icon-star.svg')}}"/>
                                        </li>
                                        <li class="single-star-wrapper">
                                            <img src="{{ asset('web/images/icon-star.svg')}}"/>
                                        </li>
                                        <li class="single-star-wrapper">
                                            <img src="{{ asset('web/images/icon-star.svg')}}"/>
                                        </li>
                                        <li class="single-star-wrapper">
                                            <img src="{{ asset('web/images/icon-star.svg')}}"/>
                                        </li>
                                    </ul>
                                    <div class="clear"></div>
                                </div>
                                <h5 class="cr-title">
                                    “My jeans are too loose”
                                </h5>
                                <p class="cr-content">
                                    I never thought that I could complete a full 30 day challenge, let alone a week
                                    challenge. Well I thought wrong! This has been such a whirlwind and amazing 30 days.
                                    I pushed my self past limits I didn’t even know existed and have seen changes in my
                                    overall physique. My jeans are too loose and keep falling and all of my friends and
                                    family notice a difference too.*
                                </p>
                            </div>
                            <div class="customer-preview-single-block">
                                <div class="star-rating-wrapper">
                                    <ul class="star-rating">
                                        <li class="single-star-wrapper">
                                            <img src="{{ asset('web/images/icon-star.svg')}}"/>
                                        </li>
                                        <li class="single-star-wrapper">
                                            <img src="{{ asset('web/images/icon-star.svg')}}"/>
                                        </li>
                                        <li class="single-star-wrapper">
                                            <img src="{{ asset('web/images/icon-star.svg')}}"/>
                                        </li>
                                        <li class="single-star-wrapper">
                                            <img src="{{ asset('web/images/icon-star.svg')}}"/>
                                        </li>
                                        <li class="single-star-wrapper">
                                            <img src="{{ asset('web/images/icon-star.svg')}}"/>
                                        </li>
                                    </ul>
                                    <div class="clear"></div>
                                </div>
                                <h5 class="cr-title">
                                    “I have completely transformed!”
                                </h5>
                                <p class="cr-content">
                                    30 days seemed like a long time when I first started, but now I’m on my third round
                                    and still loving it. I thought body weight exercises were not going to help me
                                    achieve the results I wanted, but boy was I wrong. I have completely transformed!
                                    Thank you Rauve and the Shed Fat Team. I’m a new me!*
                                </p>
                            </div>
                            <div class="clear"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="custom-guarantee-block-wrapper">
                <div class="wrapper">
                    <div class="custom-guarantee-block">
                        <div class="stiker-wrapper">
                            <div class="image-wrapper">
                                <img src="{{ asset('web/images/custom_guarantee_sticker.png')}} "/>
                            </div>
                        </div>
                        <div class="custom-guarantee-content-wrapper">
                            <div class="custom-guarantee-content">
                                <h2 class="cg-title">
                                    Still not sure? We are!
                                </h2>
                                <div class="image-wrapper">
                                    <img src="{{asset('web/images/custom_guarantee_sticker.png')}}"/>
                                </div>
                                <p class="cg-content">
                                    Follow one of our personalized exercise plans for 30 days. If after the 30 days is
                                    up and you do not feel like you are any closer to reaching your goals simply email
                                    <a href="mailto:info@shedyourfat.com">info@shedyourfat.com</a>
                                    and get a full refund.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
   <div class="popUp" data-modal="12 Week Custom Training Plan"><!-- popUp--open -->
        <div class="popUp__wrapper">
            <button type="button" class="popUp__close" data-dismiss="modal">×</button>
            <h2 class="popUp__title">FREE GIFT INCLUDED</h2>
            <div class="popUp__img-info">
                <div class="popUp__img">
                    <img src="{{ asset('web/images/popUp/meal_free_icon.png') }}" alt="meal_free_icon">
                </div>
                <div class="popUp__info">
                    <div class="popUp__name">12 Week Custom Meal Plan</div>
                    <p class="popUp__description">Get the meal plan on us! This weekend only!</p>
                    <div class="product-price-block">
                        <div class="product-price has-old-price">
                            <span class="product-amount product-amount--old ">
                                <span class="line-throw">
                                    <span class="currency">$</span>
                                    <span>80.00</span>
                                </span>
                            </span>
                            <span class="product-amount">
                            <span class="currency">$</span>
                            <span> 0.00</span>
                        </span>
                        </div>
                        <div class="btns-add-to-thanks flex flex-a--center flex-j--between">
                            <a class="add-to-cart-btn" href="/cart" >
                                View cart
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
 {{--   <div class="popUp" data-modal="12 Week Custom Training Plan"><!-- popUp--open -->
        <div class="popUp__wrapper">
            <button type="button" class="popUp__close" data-dismiss="modal">×</button>
            <h2 class="popUp__title">ALSO RECOMMENDED11</h2>
            <div class="popUp__img-info">
                <div class="popUp__img">
                    <img src="{{asset('/storage/1/icon_12_week_custom_training_plan%20%283%29.png')}}"
                         alt="product_icon">
                </div>
                <div class="popUp__info">
                    <div class="popUp__name">12 Week Custom Meal Plan</div>
                    <p class="popUp__description">Training is only 20% of the battle. 80% of results come from
                        consistent and proper nutrition!</p>

                    <div class="popUp__productPriceBlock">

                        <div class="product-price-block">
                            <div class="product-price has-old-price">
                                <div class="product-amount product-amount--old">
                                    <span class="currency">$</span>
                                    <span>100</span>
                                </div>
                                <div class="product-amount">
                                    <span class="currency">$</span>
                                    <span>40</span>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="btns-add-to-thanks flex flex-a--center flex-j--between">
                        <add-to-cart
                                product-slug="12-week-custom-meal-plan+12-week-custom-training-plan"
                        >
                        </add-to-cart>
                        --}}{{--<a href="#" class="btn add-to-cart-btn">ADD TO CART</a>--}}{{--
                        <a href="#" class="no-thanks">NO, THANKS</a>
                    </div>
                    --}}{{--<a href="#" class="learn-more">learn more</a>--}}{{--

                </div>
            </div>
        </div>
    </div>--}}
    <add-to-cart-mobile
            product-slug="{{ $product->slug }}"
    >
    </add-to-cart-mobile>
@endsection

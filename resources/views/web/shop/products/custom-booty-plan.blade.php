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
                                    100% Personalized Exercise Plan
                                   {{-- {{$product->sub_title}}--}}
                                </p>
                            </div>
                            <div class="product-description-block">
                                <p class="product-description">
                                    {!! $product->description !!}
                                </p>
                                <ul class="product-description-list check-icon-list">

                                    <li class="product-description-list-item">
                                        <i class="fas fa-check"></i>
                                        Glute Specific Training
                                    </li>
                                    <li class="product-description-list-item">
                                        <i class="fas fa-check"></i>
                                        Easy to Follow Schedule
                                    </li>
                                    <li class="product-description-list-item">
                                        <i class="fas fa-check"></i>
                                        Your Choice of Home OR Gym
                                    </li>
                                    <li class="product-description-list-item">
                                        <i class="fas fa-check"></i>
                                        Free Meal Plan Included
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
                                        Are there upper body workouts included?
                                    </strong>
                                </p>
                                <p class="item-description">
                                    Yes! Balance is key, therefore upper body and core workouts are included.
                                </p>
                            </li>
                            <li class="training-plan-faqs-list-item">
                                <p class="item-title">
                                    <strong>
                                        How many days per week will I train?
                                    </strong>
                                </p>
                                <p class="item-description">
                                    It is customized based on your schedule. Typically, we recommend 4-5 days per week (2-3 booty days and 2 upper body days).
                                </p>
                            </li>
                            <li class="training-plan-faqs-list-item">
                                <p class="item-title">
                                    <strong>
                                        Is the Free Meal Plan Customized?
                                    </strong>
                                </p>
                                <p class="item-description">
                                    Yes! You will receive a detailed questionnaire to ensure that your meal plan meets your needs.
                                </p>
                            </li>
                            <li class="training-plan-faqs-list-item">
                                <p class="item-title">
                                    <strong>
                                        Can I also lose fat with this program?
                                    </strong>
                                </p>
                                <p class="item-description">
                                    Yes! As long as you remain consistent and stick to your program.
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
            <div class="custom-plan-block-wrapper custom-meal-plan-block-wrapper" style="border-top: 1px solid red;"{{--style="background-color: white;"--}}>
                <div class="wrapper">
                    <div class="custom-plan-block">
                        <div class="separate-heading-block">
                            <div class="title-sep-container title-sep-container-left">
                                <div class="title-sep sep-single"></div>
                            </div>
                            <h2 class="separate-heading-title custom-plan-title" style="color: red;">
                                FREE CUSTOM NUTRITION PROGRAM
                            </h2>
                            <div class="title-sep-container title-sep-container-right">
                                <div class="title-sep sep-single"></div>
                            </div>
                        </div>
                        <div class="custom-plan-content">
                            <div class="custom-plan-image-block">
                                <div class="image-wrapper">
                                    <img class="desktop-image" src="{{ asset('web/images/full-product/12_week_custom_meal_plan/plates.png')}}" />
                                    <img class="mobile-image" src="{{ asset('web/images/full-product/12_week_custom_meal_plan/plate_mobile.png')}}" />
                                </div>
                            </div>
                            <div class="custom-plan-description-block">
                                <ul class="custom-plan-description-list">
                                    <li class="custom-plan-description-list-item">
                                        <div class="item-icon-wrapper">
                                            <img src="{{ asset('web/images/full-product/12_week_custom_meal_plan/nutrition-program-1.svg')}}" />
                                        </div>
                                        <div class="item-content">
                                            <h3 class="item-title">
                                                100% TAILORED
                                            </h3>
                                            <p class="item-text">
                                                TO YOUR NEEDS AND GOALS
                                            </p>
                                        </div>
                                        <div class="clear"></div>
                                    </li>
                                    <li class="custom-plan-description-list-item">
                                        <div class="item-icon-wrapper">
                                            <img src="{{ asset('web/images/full-product/12_week_custom_meal_plan/nutrition-program-2.svg')}}" />
                                        </div>
                                        <div class="item-content">
                                            <h3 class="item-title">
                                                20+ EATING STYLES
                                            </h3>
                                            <p class="item-text">
                                                Carb Cycling, Intermittent Fasting, Ketogenic, ETC.
                                            </p>
                                        </div>
                                        <div class="clear"></div>
                                    </li>
                                    <li class="custom-plan-description-list-item">
                                        <div class="item-icon-wrapper">
                                            <img src="{{ asset('web/images/full-product/12_week_custom_meal_plan/nutrition-program-3.svg')}}" />
                                        </div>
                                        <div class="item-content">
                                            <h3 class="item-title">
                                                Substitutions Guide
                                            </h3>
                                            <p class="item-text">
                                                To Add Variety
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
                                    <img data-lazy="{{ asset('web/images/success_story_slider/1/IMG_5611.jpg')}}"/>
                                </div>
                                <div class="slider-item">
                                    <img data-lazy="{{ asset('web/images/success_story_slider/1/IMG_2421.jpg')}}"/>
                                </div>
                                <div class="slider-item">
                                    <img data-lazy="{{ asset('web/images/success_story_slider/1/IMG_2810.jpg')}}"/>
                                </div>
                                <div class="slider-item">
                                    <img data-lazy="{{ asset('web/images/success_story_slider/1/IMG_7519.jpg')}}"/>
                                </div>
                                <div class="slider-item">
                                    <img data-lazy="{{ asset('web/images/success_story_slider/1/IMG_6252.jpg')}}"/>
                                </div>
                                <div class="slider-item">
                                    <img data-lazy="{{ asset('web/images/success_story_slider/1/IMG_2811.jpg')}}"/>
                                </div>
                                <div class="slider-item">
                                    <img data-lazy="{{ asset('web/images/success_story_slider/1/IMG_9363.jpg')}}"/>
                                </div>
                                <div class="slider-item">
                                    <img data-lazy="{{ asset('web/images/success_story_slider/1/IMG_4745.jpg')}}"/>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <section class="facebook-section">
                <div class="wrapper">
                    <div class="separate-heading-block">
                        <div class="title-sep-container title-sep-container-left">
                            <div class="title-sep sep-single"></div>
                        </div>
                        <h2 class="separate-heading-title custom-plan-title">
                            GET ACCESS OUR PRIVATE FACEBOOK GROUP
                        </h2>
                        <div class="title-sep-container title-sep-container-right">
                            <div class="title-sep sep-single"></div>
                        </div>
                    </div>
                    <div class="facebook-section-content-wrapper">
                        <div class="facebook-section-content-text">
                            <p>
                                Support and accountability are two key components to success. That is why we have developed a private interactive Facebook community
                                where our clients are able to ask questions, find motivation and share
                                their experiences while completing their
                                customized plans.
                            </p>
                        </div>
                        <div class="facebook-section-content-slider-wrapper">
                            <div id="FBSlider" class="facebook-section-content-slider">
                                <img src="{{asset('web/images/facebook_section/slider_image.png')}}" />
                                <img src="{{asset('web/images/facebook_section/slider_image.png')}}" />
                                <img src="{{asset('web/images/facebook_section/slider_image.png')}}" />
                            </div>
                        </div>
                    </div>
                </div>
            </section>
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
                                <p class="cr-content">
                                    I tried some other online fitness coach in the past, and the diet felt like it was copied and pasted, and I barely saw any results. The plan you gave is awesome. I have noticed a huge difference in the way that I feel as well as the way that I look. Thank you!
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
                                <p class="cr-content">
                                    I always struggled with building the booty that I wanted.
                                    After completing the 12 Week Booty Program, my only regret was that I didn’t try in sooner.
                                    I have the strong, lifted backside that I have always wanted and I feel a better than ever.
                                    Anyone who is looking for a serious confidence booster should definitely try the program!
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
                                <p class="cr-content">
                                    I am no novice when it comes to working out. For years I have gone through the
                                    same old routine of squats and lunges but I was never able to achieve the firm toned look that I was after.
                                    The best part about the 12 Week Booty Program was that in addition to simple and effective glute
                                    targeting exercise, I received an easy to follow nutrition plan that made all of the difference. It
                                    is one thing to have a big booty and it is a completely different thing to have large but firm glutes.
                                    Bye bye cellulite, hello apple bottom!
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
                                <p class="cr-content">
                                    Bye far, the most effective program that I have ever tried.
                                    All I can say is THANK YOU FOR CHANGING MY LIFE!
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
{{--    <div class="popUp" data-modal="12 Week Custom Training Plan"><!-- popUp--open -->
        <div class="popUp__wrapper">
            <button type="button" class="popUp__close" data-dismiss="modal">×</button>
            <h2 class="popUp__title">FREE GIFT</h2>
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
                    </div>
                </div>
            </div>
        </div>
    </div>--}}
    @if($product->bandls)
    <div class="popUp" data-modal="12 Week Custom Training Plan"><!-- popUp--open -->
        <div class="popUp__wrapper">
            <button type="button" class="popUp__close" data-dismiss="modal">×</button>
            <h2 class="popUp__title">ALSO RECOMMENDED</h2>
            <div class="popUp__img-info">
                <div class="popUp__img">
                    <img src="{{asset($product->bandls->getFirstMediaUrl('products'))}}"
                         alt="product_icon">
                </div>
                <div class="popUp__info">
                    <div class="popUp__name">{{ $product->bandls->title }}</div>
                    <p class="popUp__description">{{ $product->bandls->description }}</p>

                    <div class="popUp__productPriceBlock">

                        <div class="product-price-block">
                            <div class="product-price has-old-price">
                                <div class="product-amount product-amount--old">
                                    <span class="currency">$</span>
                                    <span>{{ $product->bandls->old_amount }}</span>
                                </div>
                                <div class="product-amount">
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
                    {{--<a href="#" class="learn-more">learn more</a>--}}

                </div>
            </div>
        </div>
    </div>
    @endif
    <add-to-cart-mobile
            product-slug="{{ $product->slug }}"
    >
    </add-to-cart-mobile>
@endsection
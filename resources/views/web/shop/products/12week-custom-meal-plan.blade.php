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
                        <img src="{!! $product->getFirstMediaUrl('products') !!}" />
                    </div>
                </div>
                <div class="product-info-block">
                    <div class="product-info">
                        <div class="product-title-block">
                            <h2 class="product-title custom-w">
                                {!! $product->title !!}
                            </h2>
                            <p class="product-title-sub-line">
                                {!! $product->sub_title !!}
                            </p>
                        </div>
                        <div class="product-description-block">
                            <p class="product-description">
                                {!! $product->description !!}
                            </p>
                            <ul class="product-description-list check-icon-list">
                                <li class="product-description-list-item">
                                    <i class="fas fa-check"></i>
                                    Intermittent Fasting
                                </li>
                                <li class="product-description-list-item">
                                    <i class="fas fa-check"></i>
                                    Ketogenic
                                </li>
                                <li class="product-description-list-item">
                                    <i class="fas fa-check"></i>
                                    Carb Cycling
                                </li>
                                <li class="product-description-list-item">
                                    <i class="fas fa-check"></i>
                                    Vegan/Vegetarian
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
                                <img src="{{ asset('web/images/610809299_640.jpg')}}" alt="mainImage" class="custom-video-block__coverImg">
                                <img src="{{ asset('web/carouselengine/playvideo-64-64-0.png')}}" alt="" class="custom-video-block__playImg">
                            </div>


                            <iframe src="{{ $product->getFirstMedia('products')->getCustomProperty('view_video') }}" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>

                        </div><!--custom-video-block__inner-->

                    </div><!--custom-video-block-->
                    @endif
                </div>
                <div class="training-plan-faqs-block">
                    <h4 class="training-plan-faqs-title">
                        NUTRITION FAQS
                    </h4>
                    <ul class="training-plan-faqs-list">
                        <li class="training-plan-faqs-list-item">
                            <p class="item-title">
                                <strong>
                                    Can my meal plan work for my family?
                                </strong>
                            </p>
                            <p class="item-description">
                                Yes! We can implement food selections that take feeding your family into consideration.
                            </p>
                        </li>
                        <li class="training-plan-faqs-list-item">
                            <p class="item-title">
                                <strong>
                                    I can only eat snacks at my desk, can you accommodate for that?
                                </strong>
                            </p>
                            <p class="item-description">
                                Yes! We personalize eating you fit your schedule.
                            </p>
                        </li>
                        <li class="training-plan-faqs-list-item">
                            <p class="item-title">
                                <strong>
                                    I am a very picky eater, is that a problem?
                                </strong>
                            </p>
                            <p class="item-description">
                                No! We consider all food preferences as well as food allergies when creating your customized meal plan.
                            </p>
                        </li>
                    </ul>
                </div>
                <div class="clear"></div>
            </div>
        </div>
        <div class="custom-plan-block-wrapper custom-meal-plan-block-wrapper">
            <div class="wrapper">
                <div class="custom-plan-block">
                    <div class="separate-heading-block">
                        <div class="title-sep-container title-sep-container-left">
                            <div class="title-sep sep-single"></div>
                        </div>
                        <h2 class="separate-heading-title custom-plan-title">
                            CUSTOM NUTRITION PROGRAM
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
                                            CARB CYCLING, PALEO, VEGAN, ETC.
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
                                            COOKING GUIDES
                                        </h3>
                                        <p class="item-text">
                                            TO PREP DELICIOUS FOOD
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
                                <img data-lazy="{{asset('web/images/full-product/12_week_custom_meal_plan/slider_images/IMG_1.jpg')}}" />
                            </div>
                            <div class="slider-item">
                                <img data-lazy="{{asset('web/images/full-product/12_week_custom_meal_plan/slider_images/IMG_2.jpg')}}" />
                            </div>
                            <div class="slider-item">
                                <img data-lazy="{{asset('web/images/full-product/12_week_custom_meal_plan/slider_images/IMG_3.jpg')}}" />
                            </div>
                            <div class="slider-item">
                                <img data-lazy="{{asset('web/images/full-product/12_week_custom_meal_plan/slider_images/IMG_4.jpg')}}" />
                            </div>
                            <div class="slider-item">
                                <img data-lazy="{{asset('web/images/full-product/12_week_custom_meal_plan/slider_images/IMG_5.jpg')}}" />
                            </div>
                            <div class="slider-item">
                                <img data-lazy="{{asset('web/images/full-product/12_week_custom_meal_plan/slider_images/IMG_6.jpg')}}" />
                            </div>
                            <div class="slider-item">
                                <img data-lazy="{{asset('web/images/full-product/12_week_custom_meal_plan/slider_images/IMG_7.jpg')}}" />
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
                                        <img src="{{ asset('web/images/icon-star.svg')}}" />
                                    </li>
                                    <li class="single-star-wrapper">
                                        <img src="{{ asset('web/images/icon-star.svg')}}" />
                                    </li>
                                    <li class="single-star-wrapper">
                                        <img src="{{ asset('web/images/icon-star.svg')}}" />
                                    </li>
                                    <li class="single-star-wrapper">
                                        <img src="{{ asset('web/images/icon-star.svg')}}" />
                                    </li>
                                    <li class="single-star-wrapper">
                                        <img src="{{ asset('web/images/icon-star.svg')}}" />
                                    </li>
                                </ul>
                                <div class="clear"></div>
                            </div>
                            <!--<h5 class="cr-title">
                                “I can stream them on any device”
                            </h5>-->
                            <p class="cr-content">
                                “I tried some other online fitness coach in the past, and the diet felt like it was copied and pasted, and I barely saw any results. But the plan you gave is awesome. The diet is working. I feel stronger and I’m getting leaner. It’s just a steady progress but overall I am digging the program. I will definitely do another 12 weeks because you’re are really helping me with my goals, so thank you!”
                            </p>
                        </div>
                        <div class="customer-preview-single-block">
                            <div class="star-rating-wrapper">
                                <ul class="star-rating">
                                    <li class="single-star-wrapper">
                                        <img src="{{ asset('web/images/icon-star.svg')}}" />
                                    </li>
                                    <li class="single-star-wrapper">
                                        <img src="{{ asset('web/images/icon-star.svg')}}" />
                                    </li>
                                    <li class="single-star-wrapper">
                                        <img src="{{ asset('web/images/icon-star.svg')}}" />
                                    </li>
                                    <li class="single-star-wrapper">
                                        <img src="{{ asset('web/images/icon-star.svg')}}" />
                                    </li>
                                    <li class="single-star-wrapper">
                                        <img src="{{ asset('web/images/icon-star.svg')}}" />
                                    </li>
                                </ul>
                                <div class="clear"></div>
                            </div>
                            <!--<h5 class="cr-title">
                                “I’ve lost 15 pounds the first 30 days”
                            </h5>-->
                            <p class="cr-content">
                                “I’m down 10 lbs since I saw my doctor a month ago ….I’m down 4″ in my waist…my blood pressure is the best it’s been in over 4 years! This is the best part….my blood work is AMAZING! I’ve dropped my cholesterol by 200 pts in a month and this is only my 3rd week of carb cycling!”
                            </p>
                        </div>
                        <div class="clear"></div>
                        <div class="customer-preview-single-block">
                            <div class="star-rating-wrapper">
                                <ul class="star-rating">
                                    <li class="single-star-wrapper">
                                        <img src="{{ asset('web/images/icon-star.svg')}}" />
                                    </li>
                                    <li class="single-star-wrapper">
                                        <img src="{{ asset('web/images/icon-star.svg')}}" />
                                    </li>
                                    <li class="single-star-wrapper">
                                        <img src="{{ asset('web/images/icon-star.svg')}}" />
                                    </li>
                                    <li class="single-star-wrapper">
                                        <img src="{{ asset('web/images/icon-star.svg')}}" />
                                    </li>
                                    <li class="single-star-wrapper">
                                        <img src="{{ asset('web/images/icon-star.svg')}}" />
                                    </li>
                                </ul>
                                <div class="clear"></div>
                            </div>
                            <!--<h5 class="cr-title">
                                “My jeans are too loose”
                            </h5>-->
                            <p class="cr-content">
                                “I appreciate everything you’ve done, and have learned a lot about nutrition. More importantly you have gotten me on the right path. I’ve gained muscle, and lost fat. My waist is significantly smaller, and I have abs that although they are shy …they are there. My arms, and legs are bigger, and I’m understanding my body better. I really want to thank you, and the other Shedfat team. I feel like we are part of a family.”
                            </p>
                        </div>
                        <div class="customer-preview-single-block">
                            <div class="star-rating-wrapper">
                                <ul class="star-rating">
                                    <li class="single-star-wrapper">
                                        <img src="{{ asset('web/images/icon-star.svg')}}" />
                                    </li>
                                    <li class="single-star-wrapper">
                                        <img src="{{ asset('web/images/icon-star.svg')}}" />
                                    </li>
                                    <li class="single-star-wrapper">
                                        <img src="{{ asset('web/images/icon-star.svg')}}" />
                                    </li>
                                    <li class="single-star-wrapper">
                                        <img src="{{ asset('web/images/icon-star.svg')}}" />
                                    </li>
                                    <li class="single-star-wrapper">
                                        <img src="{{ asset('web/images/icon-star.svg')}}" />
                                    </li>
                                </ul>
                                <div class="clear"></div>
                            </div>
                            <!--<h5 class="cr-title">
                                “I have completely transformed!”
                            </h5>-->
                            <p class="cr-content">
                                “My relationship with food took a complete 360, meals no longer seem scary and I enjoy putting all the good food in my body!! My confidence has sky rocketed. Seeing my body transform is really crazy and I’m just falling in love with myself. That’s something I’ve always lacked. Even though I’m not on the booty plan the cellulite on my booty is barely there and it’s looking very good! I finally have the hang of things and my junk food cravings are pretty much gone! I love this journey I can’t wait to keep going! I’ll talk to you next week, thank youuuu.”
                            </p>
                        </div>
                        <div class="clear"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="custom-guarantee-block-wrapper" >
            <div class="wrapper">
                <div class="custom-guarantee-block">
                    <div class="stiker-wrapper">
                        <div class="image-wrapper">
                            <img src="{{ asset('web/images/custom_guarantee_sticker.png')}}" />
                        </div>
                    </div>
                    <div class="custom-guarantee-content-wrapper">
                        <div class="custom-guarantee-content">
                            <h2 class="cg-title">
                                Still not sure? We are!
                            </h2>
                            <div class="image-wrapper">
                                <img src="{{asset('web/images/custom_guarantee_sticker.png')}}" />
                            </div>
                            <p class="cg-content">
                                Follow one of our personalized exercise plans for 30 days. If after the 30 days is up and you do not feel like you are any closer to reaching your goals simply email
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
{{--<div class="popUp" data-modal="12 Week Custom Meal Plan"><!-- popUp--open -->
    <div class="popUp__wrapper">
        <button type="button" class="popUp__close" data-dismiss="modal">×</button>
        <h2 class="popUp__title">FREE GIFT</h2>
        <div class="popUp__img-info">
            <div class="popUp__img">
                <img src="{{ asset('web/images/popUp/12-week-popUp.png') }}" alt="12-week-popUp">
            </div>
            <div class="popUp__info">
                <div class="popUp__name">12 Week Custom Training Plan</div>
                <p class="popUp__description">Get the training plan on us! This weekend only!</p>
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
<div class="popUp" data-modal="12 Week Custom Meal Plan"><!-- popUp--open -->
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
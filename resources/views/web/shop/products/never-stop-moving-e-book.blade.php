@extends('web.layouts.app')
@section('title')
    {!! $product->title !!} -@parent
@endsection
@section('content')
    <main>
        <div class="top-product-description-block triangle-bottom">
            <div class="wrapper">
                <div class="product-preview-wrapper">
                    <div class="image-wrapper">
                        <img src="{!! $product->getFirstMediaUrl('products') !!}" />
                    </div>
                </div>
                <div class="product-info-block ">
                    <div class="product-info">
                        <div class="product-title-block">
                            <h2 class="product-title">
                                {!! $product->title !!}
                            </h2>
                        </div>
                        <div class="product-description-block">
                            <p class="product-description">
                                {!! $product->description !!}
                                {{--Looking for a comprehensive yet simple training plan? Never Stop Moving is our 63-day, total body tutorial! We teach you how to achieve and more importantly how to maintain a tighter and more toned physique from head to toe.--}}
                            </p>
                        </div>
                        <div class="product-price-block">
                            <div class="product-price has-old-price">
                                @if($product->old_amount)
                                <span class="product-amount product-amount--old">
                                <span class="currency">$</span>
                                {{--<span>50.00</span>--}}
                                <span>{{ $product->old_amount }}</span>
                            </span>
                                @endif
                                    <span class="product-amount product-amount--new-price">
                            <span class="currency">$</span>
                            {{--<span>30.00</span>--}}
                                    <span>{{ $product->amount }}</span>
                        </span>
                            </div>
                        </div>
                        <add-to-cart
                                product-slug="{{ $product->slug }}"
                                data-title="12 Week Custom Meal Plan"
                        >
                        </add-to-cart>
                    </div>
                </div>
                <div class="clear"></div>
            </div>
        </div>


        <section class="section__wrapper total-results">
            <div class="wrapper">
                <h2 class="section__title after-lines after-lines--black text-center">THE TOTAL PACKAGE FOR TOTAL RESULTS</h2>
                <p class="section__text text-center">Getting in shape can be overwhelming. That is why we provide you with everything that you need to make the a complete transformation. We tell you what exercises to perform, how to perform them, what meals to eat, what ingredients you should be shopping for and how what you should be doing to recover.</p>
                <div class="total-results__img">
                    <img src="{{ asset('web/images/full-product/never-stop-moving/package.png')}}" alt="book" class="full-width desktop-image" />
                    <img src="{{ asset('web/images/full-product/never-stop-moving/package-mobile.png')}}" alt="book" class="full-width mobile-image" />
                </div>

                <div class="total-results__icons inline-block text-center">
                    {{--<div class="total-results__icon-wrapper">--}}
                        {{--<div class="total-results__icon-img flex flex-a--center flex-j--center">--}}
                            {{--<img src="{{ asset('web/images/full-product/total-results/icon-calendar.svg')}}" alt="calendar">--}}
                        {{--</div>--}}
                        {{--<div class="text-center">--}}
                            {{--<h3 class="total-results__icon-text">--}}
                                {{--9 Week Progressive Training Calendar--}}
                            {{--</h3>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    {{--<div class="total-results__icon-wrapper">--}}
                        {{--<div class="total-results__icon-img flex flex-a--center flex-j--center">--}}
                            {{--<img src="{{ asset('web/images/full-product/total-results/icon-exercise.svg')}}" alt="exercise">--}}
                        {{--</div>--}}
                        {{--<div class="text-center">--}}
                            {{--<h3 class="total-results__icon-text">--}}
                                {{--How-to Exercise Instructions--}}
                            {{--</h3>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    {{--<div class="total-results__icon-wrapper">--}}
                        {{--<div class="total-results__icon-img flex flex-a--center flex-j--center">--}}
                            {{--<img src="{{ asset('web/images/full-product/total-results/icon-workout-recovery.svg')}}" alt="icon-workout-recovery">--}}
                        {{--</div>--}}
                        {{--<div class="text-center">--}}
                            {{--<h3 class="total-results__icon-text">--}}
                                {{--Post Workout Recovery Tips--}}
                            {{--</h3>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    {{--<div class="total-results__icon-wrapper">--}}
                        {{--<div class="total-results__icon-img flex flex-a--center flex-j--center">--}}
                            {{--<img src="{{ asset('web/images/full-product/total-results/icon-eat-clean.svg')}}" alt="icon-eat-clean">--}}
                        {{--</div>--}}
                        {{--<div class="text-center">--}}
                            {{--<h3 class="total-results__icon-text">--}}
                                {{--Everything That You Need to Know About Eating Clean--}}
                            {{--</h3>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    {{--<div class="total-results__icon-wrapper">--}}
                        {{--<div class="total-results__icon-img flex flex-a--center flex-j--center">--}}
                            {{--<img src="{{ asset('web/images/full-product/total-results/icon-grocery-icon.svg')}}" alt="icon-grocery-icon.svg">--}}
                        {{--</div>--}}
                        {{--<div class="text-center">--}}
                            {{--<h3 class="total-results__icon-text">--}}
                                {{--Smart Grocery Shopping List--}}
                            {{--</h3>--}}
                        {{--</div>--}}
                    {{--</div>--}}


                </div>
            </div>
        </section>
        <section class="parallax-section parallax-section--never-stop" data-speed=".7" data-size="100vw" data-parallax="scroll" data-image-src="{{asset('web/images/full-product/parallax/maximize_bg.jpg')}}" data-relative-input="true">

            <div class="wrapper">
                <h2 class="section__title section__title--white after-lines after-lines--large after-lines--red text-center section__title--what-eat">
                    MAXIMIZE YOUR RESULTS
                </h2>
                <p class="section__text section__text--white text-center">Combine Never Stop Moving and our Custom Meal Plan to achieve greater results.</p>


                <div class="block-in-section-wrapper flex flex-j--between">
                    <div class="block-in-section  block-in-section--40 text-center">
                        <img src="{{asset('web/images/full-product/never-stop-moving/12_week_custom_meal_plan_icon-1.png')}}" alt="12_week_custom_meal_plan_icon">
                    </div>
                    <div class="block-in-section block-in-section--60">
                        <h2 class="parallax-section__title  parallax-section__title--red">12 WEEK CUSTOM MEAL PLAN</h2>
                        <h4 class="parallax-section__subTitle parallax-section__subTitle--white">100% Personalized Meal Plan</h4>
                        <p class="parallax-section__info parallax-section__info--white">
                            Training is important but nutrition is what can make or break you! Our dedicated team knows that reaching any health and fitness goal starts with a solid nutrition plan. We do want not look at this as a diet, we want you to look at this as an opportunity to lay a strong foundation for years to come. That is why we offer various meal plan options that can be tailored to any lifestyle.
                        </p>
                        <ul class="parallax-section__list parallax-section__list--white">
                            <li>Intermittent Fasting</li>
                            <li>Ketogenic</li>
                            <li>Carb Cycling</li>
                            <li>Vegan/Vegetarian</li>
                        </ul>
                        <div class="product-price-block">
                            <div class="product-price has-old-price">
                            <span class="product-amount product-amount--old product-amount--white">
                                 <span class="currency">$</span>
                                <span>100.00</span>
                            </span>
                                <span class="product-amount">
                                <span class="currency">$</span>
                                <span>50.00</span>
                            </span>
                            </div>
                        </div>
                        <div class="product-button-block">
                            <div class="add-to-cart-wrapper">
                                <a class="add-to-cart-btn" href="#">
                                    Add to cart
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section>

        <div class="training-plan-faqs-block-wrapper">
            <div class="wrapper">
                <div class="video-block-wrapper">
                    <div class="video-block">
                        <div id="amazingcarousel-container-1">
                            <div id="amazingcarousel-1" style="display: block; position: relative; width: 100%; max-width: 990px; margin: 0px auto; direction: ltr;">
                                <div class="amazingcarousel-list-container" style="position: relative; margin: 0px auto; overflow: visible;">
                                    <div class="amazingcarousel-list-wrapper" style="overflow: hidden;"><ul class="amazingcarousel-list" style="display: block; position: relative; list-style-type: none; list-style-image: none; background-image: none; background-color: transparent; padding: 0px; margin: 0px;">
                                            <li class="amazingcarousel-item amazingcarousel-item-0" style="display: block; position: relative; background-image: none; background-color: transparent; margin: 0px; padding: 0px; float: left;">
                                                <div class="amazingcarousel-item-container" style="position: relative; margin: 0px 4px;">
                                                    <div class="amazingcarousel-image">
                                                        <a href="https://player.vimeo.com/video/197558254" title="Rauve workout plan GYM" class="html5lightbox" data-group="amazingcarousel-1"><img src="{{ asset('web/images/610809299_640.jpg')}}" alt="Rauve workout plan GYM"></a>
                                                        <div class="amazingcarousel-play-video" style="position:absolute;left:0;top:0;width:100%;height:100%;cursor:pointer;background-image:url('http://localhost:5000/assets/carouselengine/playvideo-64-64-0.png');background-repeat:no-repeat;background-position:center center;"></div></div>
                                                </div>
                                            </li>
                                            <div style="clear:both;"></div></ul></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="training-plan-faqs-block">
                    <h4 class="training-plan-faqs-title">
                       FAQS
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

    </main>
    <div class="popUp" data-modal="12 Week Custom Meal Plan"><!-- popUp--open -->
        <div class="popUp__wrapper">
            <button type="button" class="popUp__close" data-dismiss="modal">×</button>
            <h2 class="popUp__title">MAXIMIZE YOUR RESULTS</h2>
            <p class="popUp__subTitle">Combine Never Stop Moving and our Custom Meal Plan to achieve greater results.</p>
            <div class="popUp__img-info">
                <div class="popUp__img">
                    <img src="{{asset('web/images/popUp/meal_free_icon.png')}}" alt="meal_free_icon">
                </div>
                <div class="popUp__info">
                    <div class="popUp__name">12 Week Custom Meal Plan</div>
                    <p class="popUp__description">Training is only 20% of the battle. 80% of results come from consistent and proper nutrition!</p>

                    <div class="popUp__productPriceBlock">

                        <div class="product-amount">
                            <div class="flex flex-a--center">
                                <div class="old-price line-throw">
                                    <span class="currency">$</span>
                                    <span>80.00</span>
                                </div>
                                <div class="product-price">
                                    <span class="currency">$</span>
                                    <span>50.00</span>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="btns-add-to-thanks flex flex-a--center flex-j--between">
                        <a href="#" class="btn add-to-cart-btn">ADD TO CART</a>
                        <a href="#" class="no-thanks">NO, THANKS</a>
                    </div>
                    <a href="#" class="learn-more">learn more</a>

                </div>
            </div>
        </div>
    </div>
    {{--<a href="#" class="btn add-to-cart-btn add-to-cart-btn--mobile">ADD TO CART</a>--}}
    <add-to-cart-mobile
            product-slug="{{ $product->slug }}"
    >
    </add-to-cart-mobile>

    @endsection
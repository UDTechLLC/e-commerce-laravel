@extends('web.layouts.app')
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
                                <span class="product-amount">
                            <span class="currency">$</span>
                            {{--<span>30.00</span>--}}
                                    <span>{{ $product->amount }}</span>
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
                <div class="clear"></div>
            </div>
        </div>


        <section class="section__wrapper total-results">
            <div class="wrapper">
                <h2 class="section__title after-lines after-lines--black text-center">THE TOTAL PACKAGE FOR TOTAL RESULTS</h2>
                <p class="section__text text-center">Getting in shape can be overwhelming. That is why we provide you with everything that you need to make the a complete transformation. We tell you what exercises to perform, how to perform them, what meals to eat, what ingredients you should be shopping for and how what you should be doing to recover.</p>
                <div class="total-results__img">
                    <img src="{{ asset('web/images/full-product/book.png')}}" alt="book" class="full-width">
                </div>

                <div class="total-results__icons inline-block text-center">
                    <div class="total-results__icon-wrapper">
                        <div class="total-results__icon-img flex flex-a--center flex-j--center">
                            <img src="{{ asset('web/images/full-product/total-results/icon-calendar.svg')}}" alt="calendar">
                        </div>
                        <div class="text-center">
                            <h3 class="total-results__icon-text">
                                9 Week Progressive Training Calendar
                            </h3>
                        </div>
                    </div>
                    <div class="total-results__icon-wrapper">
                        <div class="total-results__icon-img flex flex-a--center flex-j--center">
                            <img src="{{ asset('web/images/full-product/total-results/icon-exercise.svg')}}" alt="exercise">
                        </div>
                        <div class="text-center">
                            <h3 class="total-results__icon-text">
                                How-to Exercise Instructions
                            </h3>
                        </div>
                    </div>
                    <div class="total-results__icon-wrapper">
                        <div class="total-results__icon-img flex flex-a--center flex-j--center">
                            <img src="{{ asset('web/images/full-product/total-results/icon-workout-recovery.svg')}}" alt="icon-workout-recovery">
                        </div>
                        <div class="text-center">
                            <h3 class="total-results__icon-text">
                                Post Workout Recovery Tips
                            </h3>
                        </div>
                    </div>
                    <div class="total-results__icon-wrapper">
                        <div class="total-results__icon-img flex flex-a--center flex-j--center">
                            <img src="{{ asset('web/images/full-product/total-results/icon-eat-clean.svg')}}" alt="icon-eat-clean">
                        </div>
                        <div class="text-center">
                            <h3 class="total-results__icon-text">
                                Everything That You Need to Know About Eating Clean
                            </h3>
                        </div>
                    </div>
                    <div class="total-results__icon-wrapper">
                        <div class="total-results__icon-img flex flex-a--center flex-j--center">
                            <img src="{{ asset('web/images/full-product/total-results/icon-grocery-icon.svg')}}" alt="icon-grocery-icon.svg">
                        </div>
                        <div class="text-center">
                            <h3 class="total-results__icon-text">
                                Smart Grocery Shopping List
                            </h3>
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

    </main>
    <a href="#" class="btn add-to-cart-btn add-to-cart-btn--mobile">ADD TO CART</a>
    @endsection
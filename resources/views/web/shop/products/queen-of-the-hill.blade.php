@extends('web.layouts.app')
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
                        {{ $product->description}}
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
    <section class="section__wrapper queen-of-the-hill__bg">
        <div class="wrapper">
            <h2 class="section__title after-lines after-lines--large text-center">
                90 DAY GUIDE TO <br>
                A STRONG AND SEXY FIGURE
            </h2>
            <p class="section__text">
                QUEEN OF THE HILL is our all-encompassing guide to achieving the body that you have always wanted. After the first 6 weeks, the program changes, keeping it fun and effective! Use it to ensure that your time in the gym is optimized and your results are maximized!
            </p>

            <div class="section__img">
                <img src="{{ asset('web/images/full-product/queen-of-the-hill/books-90days.png')}}" alt="book" class="full-width">
            </div>

            <div class="section__icons inline-block text-center">
                <div class="section__icon-wrapper">
                    <div class="section__icon-img flex flex-a--center flex-j--center">
                        <img src="{{ asset('web/images/full-product/queen-of-the-hill/full_weekly.svg')}}" alt="">
                    </div>
                    <div class="text-center">
                        <h3 class="section__icon-text">
                            FULL WEEKLY BREAK DOWN
                        </h3>
                        <p class="section__icon-info">
                            What to do and when to do it!
                        </p>
                    </div>
                </div>
                <div class="section__icon-wrapper">
                    <div class="section__icon-img flex flex-a--center flex-j--center">
                        <img src="{{ asset('web/images/full-product/queen-of-the-hill/icon_Get-Toned-1.svg')}}" alt="">
                    </div>
                    <div class="text-center">
                        <h3 class="section__icon-text">
                            GET TONED
                        </h3>
                        <p class="section__icon-info">
                            We concentrate on fat loss over weight loss
                        </p>
                    </div>
                </div>
                <div class="section__icon-wrapper">
                    <div class="section__icon-img flex flex-a--center flex-j--center">
                        <img src="{{ asset('web/images/full-product/queen-of-the-hill/recovery.svg')}}" alt="">
                    </div>
                    <div class="text-center">
                        <h3 class="section__icon-text">
                            RECOVERY TIPS
                        </h3>
                        <p class="section__icon-info">
                            Rest allows the body to change
                        </p>
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
                                <div class="amazingcarousel-list-wrapper" style="overflow: hidden;"><div class="amazingcarousel-list-wrapper" style="overflow: hidden;"><ul class="amazingcarousel-list" style="display: block; position: relative; list-style-type: none; list-style-image: none; background-image: none; background-color: transparent; padding: 0px; margin: 0px;">
                                            <li class="amazingcarousel-item amazingcarousel-item-0" style="display: block; position: relative; background-image: none; background-color: transparent; margin: 0px; padding: 0px; float: left;">
                                                <div class="amazingcarousel-item-container" style="position: relative; margin: 0px 4px;">
                                                    <div class="amazingcarousel-image">
                                                        <a href="https://player.vimeo.com/video/197558254" title="Rauve workout plan GYM" class="html5lightbox" data-group="amazingcarousel-1"><img src="{{ asset('web/images/610809299_640.jpg')}}" alt="Rauve workout plan GYM"></a>
                                                        <div class="amazingcarousel-play-video" style="position:absolute;left:0;top:0;width:100%;height:100%;cursor:pointer;background-image:url('http://localhost:5000/assets/carouselengine/playvideo-64-64-0.png');background-repeat:no-repeat;background-position:center center;"></div><div class="amazingcarousel-play-video" style="position:absolute;left:0;top:0;width:100%;height:100%;cursor:pointer;background-image:url('http://localhost:5000/assets/carouselengine/playvideo-64-64-0.png');background-repeat:no-repeat;background-position:center center;"></div></div>
                                                </div>
                                            </li>
                                            <div style="clear:both;"></div><div style="clear:both;"></div></ul></div></div>
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

<!--fixed btn add to card-->
<a href="#" class="btn add-to-cart-btn add-to-cart-btn--mobile">ADD TO CART</a>
<!-- //// fixed btn add to card-->

@endsection
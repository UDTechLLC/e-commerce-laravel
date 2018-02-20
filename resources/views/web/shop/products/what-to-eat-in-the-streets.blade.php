@extends('web.layouts.app')
@section('content')
    <main>
            <div class="top-product-description-block">
                <div class="wrapper">
                    <div class="product-preview-wrapper">
                        <div class="image-wrapper">
                            {{--<img src="assets/images/full-product/what-to-eat-mainimage.png">--}}
                            <img src="{!! $product->getFirstMediaUrl('products') !!}" />
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
                                   {{ $product->description }}
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



            <section class="parallax-section" data-speed=".7" data-size="100vw" data-parallax="scroll" data-image-src="{{ asset('web/images/full-product/parallax/on-the-go-bg.jpg')}}" data-relative-input="true">

                <div class="wrapper">
                    <h2 class="section__title after-lines after-lines--white text-center">
                        ON THE GO? FORGET YOUR LUNCH
                        AT HOME? NO TIME TO COOK?
                    </h2>
                    <p class="section__text section__text--white text-center">Grabbing food on the go can be tricky. How can you stay on track with your
                        health and fitness goals when you can’t get to the kitchen?</p>


                    <div class="block-in-section-wrapper flex flex-j--between">
                        <div class="block-in-section block-in-section--image">
                            <img src="{{ asset('web/images/full-product/ipad-desktop.png')}}" alt="ipad-desktop">
                        </div>
                        <div class="block-in-section">
                            <div class="flex flex-j--between">
                                <div class="block-in-section__icon-wr">
                                    <div class="block-in-section__icon">
                                        <img src="{{ asset('web/images/full-product/icons/user-friendly.svg')}}" alt="user-friendly">
                                    </div>
                                    <h3 class="block-in-section__title">
                                        USER FRIENDLY
                                    </h3>
                                    <p class="block-in-section__info">
                                        Clear and  Concise, Eliminating Confusion
                                    </p>
                                </div>
                                <div class="block-in-section__icon-wr">
                                    <div class="block-in-section__icon">
                                        <img src="{{ asset('web/images/full-product/icons/menu-guide.svg')}}" alt="menu-guide">
                                    </div>
                                    <h3 class="block-in-section__title">
                                        MENU GUIDE
                                    </h3>
                                    <p class="block-in-section__info">
                                        We Show You What to Eat and What to Avoid
                                    </p>
                                </div>
                            </div>
                            <div class="flex flex-j--between">
                                <div class="block-in-section__icon-wr">
                                    <div class="block-in-section__icon">
                                        <img src="{{ asset('web/images/full-product/icons/mobile-friendly.svg')}}" alt="mobile-friendly">
                                    </div>
                                    <h3 class="block-in-section__title">
                                        MOBILE FRIENDLY
                                    </h3>
                                    <p class="block-in-section__info">
                                        Access From Any Smart Device
                                    </p>
                                </div>
                                <div class="block-in-section__icon-wr">
                                    <div class="block-in-section__icon">
                                        <img src="{{ asset('web/images/full-product/icons/places-to-eat.svg')}}" alt="places-to-eat">
                                    </div>
                                    <h3 class="block-in-section__title">
                                        PLACES TO EAT
                                    </h3>
                                    <p class="block-in-section__info">
                                        We Show You Where You Can Go
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </section>

            <section class="section__wrapper grey-section restaurants">
                <div class="wrapper">
                    <h2 class="section__title after-lines after-lines--large text-center">
                        FEATURED RESTAURANTS
                    </h2>


                    <div class="restaurants__wrap inline-block text-center">
                        <div class="restaurants__item"> <span>CAVA</span></div>
                        <div class="restaurants__item"> <span>PANDA EXPRESS</span> </div>
                        <div class="restaurants__item"> <span>PANERA BREAD</span> </div>
                        <div class="restaurants__item"> <span>IHOP</span> </div>
                        <div class="restaurants__item"> <span>STARBUCKS</span> </div>
                        <div class="restaurants__item"> <span>JIMMY JOHNS</span> </div>
                        <div class="restaurants__item"> <span>NANDOS</span> </div>
                        <div class="restaurants__item"> <span>HARVEYS</span> </div>
                        <div class="restaurants__item"> <span>TIM HORTONS</span> </div>
                        <div class="restaurants__item"> <span>QDOBA</span> </div>
                        <div class="restaurants__item"> <span>CHICK-FILA-A</span> </div>
                        <div class="restaurants__item"> <span>CHIPOLTE</span> </div>
                    </div>

                </div>
            </section>

            <section class="section__wrapper comments">
                <div class="wrapper">
                    <div class="comments__wrapper">
                        <div class="comments__item flex flex-a--center">
                            <div class="comments__img">
                                <img src="{{ asset('web/images/full-product/comments/man.png')}}" alt="man">
                            </div>
                            <div class="comments__text">
                                <p>I am trying to shed stubborn body fat but I am afraid to eat fast food!</p>
                            </div>
                        </div>
                        <div class="comments__reply flex flex-j--end flex-a--center">
                            <div class="comments__text">
                                <p>Do not worry! We show you which menu selections will keep your
                                    metabolism fired up those unwanted pounds burning off.</p>
                            </div>
                            <div class="comments__img">
                                <img src="{{ asset('web/images/full-product/comments/shedfat.png')}}" alt="shedfat">
                            </div>

                        </div>
                    </div>


                    <div class="comments__wrapper">
                        <div class="comments__item flex flex-a--center">
                            <div class="comments__img">
                                <img src="{{ asset('web/images/full-product/comments/woman.png')}}" alt="man">
                            </div>
                            <div class="comments__text">
                                <p>I am trying to build lean muscle, can food on the go work for me?</p>
                            </div>
                        </div>
                        <div class="comments__reply flex flex-j--end flex-a--center">
                            <div class="comments__text">
                                <p>No problem! We show you which menu selections will <br>
                                    keep your body in muscle building mode.</p>
                            </div>
                            <div class="comments__img">
                                <img src="{{ asset('web/images/full-product/comments/shedfat.png')}}" alt="shedfat">
                            </div>

                        </div>
                    </div>

                </div>
            </section>


            <section class="grey-section">
                <div class="training-plan-faqs-block-wrapper">
                    <div class="wrapper">

                        <div class="flex flex-a--center flex--m-block">

                            <div class="video-block-wrapper">
                                <div class="video-block">
                                    <div id="amazingcarousel-container-1">
                                        <div id="amazingcarousel-1" style="display: block; position: relative; width: 100%; max-width: 990px; margin: 0px auto; direction: ltr;">
                                            <div class="amazingcarousel-list-container" style="position: relative; margin: 0px auto; overflow: visible;">
                                                <div class="amazingcarousel-list-wrapper" style="overflow: hidden;"><ul class="amazingcarousel-list" style="display: block; position: relative; list-style-type: none; list-style-image: none; background-image: none; background-color: transparent; padding: 0px; margin: 0px;">
                                                        <li class="amazingcarousel-item amazingcarousel-item-0" style="display: block; position: relative; background-image: none; background-color: transparent; margin: 0px; padding: 0px; float: left;">
                                                            <div class="amazingcarousel-item-container" style="position: relative; margin: 0px 4px;">
                                                                <div class="amazingcarousel-image border-red" >
                                                                    <a href="https://player.vimeo.com/video/229748597" title="Rauve workout plan GYM" class="html5lightbox" data-group="amazingcarousel-1"><img src="{{ asset('web/images/650138810_640.jpg')}}" alt="Rauve workout plan GYM"></a>
                                                                    <div class="amazingcarousel-play-video" style="position:absolute;left:0;top:0;width:100%;height:100%;cursor:pointer;background-image:url('/assets/carouselengine/playvideo-64-64-0.png');background-repeat:no-repeat;background-position:center center;"></div></div>
                                                            </div>
                                                        </li>
                                                        <div style="clear:both;"></div></ul></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>



                            <div class="get-more__text">
                                <img src="{{ asset('web/images/full-product/lettering-1.png')}}" alt="get-more">
                            </div>




                        </div>



                        <div class="training-plan-faqs-block">


                        </div>
                        <div class="clear"></div>
                    </div>
                </div>
            </section>

        </main>
    <a href="#" class="btn add-to-cart-btn add-to-cart-btn--mobile">ADD TO CART</a>
     @endsection
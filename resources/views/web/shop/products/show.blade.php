<!doctype html>

<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">

    <title>ShedYourFat Product page</title>

    <link rel="stylesheet" href="{{ asset('web/css/base.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('web/carouselengine/initcarousel-1.css') }}">
    <!--<link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">-->

    <!--[if lt IE 9]>
    <script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

</head>

<body>
<div class="main">
    <div class="top-product-description-block">
        <div class="wrapper">
            <div class="product-preview-wrapper">
                <div class="image-wrapper">
                    <img src="{{ asset('web/images/training_new_desktop.png') }}" />
                </div>
            </div>
            <div class="product-info-block">
                <div class="product-info">
                    <div class="product-title-block">
                        <h2 class="product-title">
                            12 Week Custom

                            <br>
                            <!--<wbr>-->
                            Training Plan
                            {{$product->title}}
                        </h2>
                        <p class="product-title-sub-line">
                            100% Personalized Training Program
                        </p>
                    </div>
                    <div class="product-description-block">
                        <p class="product-description">
                            {{--{!! $product->description !!}--}}
                            Our dedicated team will develop a personalized training plan that not only makes sense, but makes a real difference. Let us show you what a difference 12 weeks can actually make!
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
                        <div class="product-price">
									<span class="product-amount">
                                        {{--{{ $product->amount }}--}}
										$100.00
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
    <div class="training-plan-faqs-block-wrapper">
        <div class="wrapper">
            <div class="video-block-wrapper">
                <div class="video-block">
                    <div id="amazingcarousel-container-1">
                        <div id="amazingcarousel-1" style="display:none;position:relative;width:100%;max-width:650px;margin:0px auto 0px;">
                            <div class="amazingcarousel-list-container">
                                <ul class="amazingcarousel-list">
                                    <li class="amazingcarousel-item">
                                        <div class="amazingcarousel-item-container">
                                            <div class="amazingcarousel-image">
                                                <a href="https://player.vimeo.com/video/197577248" title="Rauve workout plan GYM"  class="html5lightbox" data-group="amazingcarousel-1"><img src="{{ asset('web/images/197577248.jpg') }}"  alt="Rauve workout plan GYM" /></a>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
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
                            <img src="{{ asset('web/images/custom-training-program.png') }}" />
                        </div>
                    </div>
                    <div class="custom-plan-description-block">
                        <ul class="custom-plan-description-list">
                            <li class="custom-plan-description-list-item">
                                <div class="item-icon-wrapper">
                                    <img src="{{ asset('web/images/workout-program-1.svg') }}" />
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
                                    <img src="{{asset('web/images/workout-program-2.svg')}}" />
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
                                    <img src="{{asset('web/images/workout-program-3.svg')}}" />
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
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
<script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
<script src="{{ asset('web/carouselengine/amazingcarousel.js') }}"></script>
<script src="{{ asset('web/carouselengine/initcarousel-1.js') }}"></script>
{{--<script src="{{ asset('web/js/scripts.js') }}"></script>--}}
</body>
</html>
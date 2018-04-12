@extends('web.layouts.app')
@section('title')
    Spring Challenge -@parent
@endsection
@section('content')
    <main>
        <div class="sc-top-banner-block-wrapper">
            <div class="sc-top-banner-block">
                <h2 class="first-line">
                    SPRING IS HERE!
                </h2>
                <h2 class="second-line red">
                    30 DAYS CHALLENGE
                </h2>
                <p class="red">
                    <strong>
                        April 30
                        <sup>th</sup>
                        – May 30
                        <sup>th</sup>
                    </strong>
                </p>
                <h2 class="last-line">
                    Register NOW to Win your share of
                    <span class="red">
                            $5K
                        </span>
                </h2>
                <a class="sc-register-button" href="#scRegistration">
                    Register
                </a>
            </div>
        </div>
        <div class="sc-winning-block">
            <h2 class="sc-winning-headline">
                WINNINGS
            </h2>
        </div>
        <div class="sc-prizes-block-wrapper">
            <div class="wrapper">
                <div class="sc-prizes-block">
                    <h2 class="sc-prizes-block-title">
                        Prizes:
                    </h2>
                    <div class="sc-prizes-columns-wrapper">
                        <div class="sc-prizes-column-single">
                            <h3 class="sc-prizes-column-title">
                                2<sup>nd</sup> PLACE
                            </h3>
                            <ul class="sc-prizes-list">
                                <li class="sc-prizes-item">
                                    <span class="sc-prizes-list-icon"></span>
                                    <p>
                                        $500 cash
                                        <img src="{{asset('web/images/spring_challenges/prizes_list_icons/cash.png')}}"
                                             width="30px">
                                    </p>
                                </li>
                                <li class="sc-prizes-item">
                                    <span class="sc-prizes-list-icon"></span>
                                    <p>
                                        6 month supply of Shedfat maxx
                                        <img src="{{asset('web/images/spring_challenges/prizes_list_icons/5.png')}}">
                                    </p>
                                </li>
                                <li class="sc-prizes-item">
                                    <span class="sc-prizes-list-icon"></span>
                                    <p>
                                        6 month online training
                                        <img src="{{asset('web/images/spring_challenges/prizes_list_icons/7.png')}}">
                                    </p>
                                </li>
                            </ul>
                        </div>
                        <div class="sc-prizes-column-single">
                            <h3 class="sc-prizes-column-title">
                                1<sup>st</sup> PLACE
                            </h3>

                            <ul class="sc-prizes-list">
                                <li class="sc-prizes-item">
                                    <span class="sc-prizes-list-icon"></span>
                                    <p>
                                        $1000 cash
                                        <img src="{{asset('web/images/spring_challenges/prizes_list_icons/cash.png')}}"
                                             width="30px">
                                    </p>
                                </li>
                                <li class="sc-prizes-item">
                                    <span class="sc-prizes-list-icon"></span>
                                    <p>
                                        Airfare
                                        <img src="{{asset('web/images/spring_challenges/prizes_list_icons/1.png')}}">
                                    </p>
                                </li>
                                <li class="sc-prizes-item">
                                    <span class="sc-prizes-list-icon"></span>
                                    <p>
                                        Hotel
                                        <img src="{{asset('web/images/spring_challenges/prizes_list_icons/2.png')}}">
                                    </p>
                                </li>
                                <li class="sc-prizes-item">
                                    <span class="sc-prizes-list-icon"></span>
                                    <p>
                                        Photoshoot
                                        <img src="{{asset('web/images/spring_challenges/prizes_list_icons/3.png')}}">
                                    </p>
                                </li>
                                <li class="sc-prizes-item">
                                    <span class="sc-prizes-list-icon"></span>
                                    <p>
                                        Videoshoot
                                        <img src="{{asset('web/images/spring_challenges/prizes_list_icons/4.png')}}">
                                    </p>
                                </li>
                                <li class="sc-prizes-item">
                                    <span class="sc-prizes-list-icon"></span>
                                    <p>
                                        Workout with ShedFat coaches
                                        <img src="{{asset('web/images/spring_challenges/prizes_list_icons/hand.png')}}"
                                             width="30px">
                                    </p>
                                </li>
                                <li class="sc-prizes-item">
                                    <span class="sc-prizes-list-icon"></span>
                                    <p>
                                        1 year supply of Shedfat maxx
                                        <img src="{{asset('web/images/spring_challenges/prizes_list_icons/5.png')}}">
                                    </p>
                                </li>
                                <li class="sc-prizes-item">
                                    <span class="sc-prizes-list-icon"></span>
                                    <p>
                                        1 year online training
                                        <img src="{{asset('web/images/spring_challenges/prizes_list_icons/7.png')}}">
                                    </p>
                                </li>
                            </ul>
                        </div>
                        <div class="sc-prizes-column-single">
                            <h3 class="sc-prizes-column-title">
                                3<sup>rd</sup> PLACE
                            </h3>
                            <ul class="sc-prizes-list">
                                <li class="sc-prizes-item">
                                    <span class="sc-prizes-list-icon"></span>
                                    <p>
                                        6 month supply of Shedfat maxx
                                        <img src="{{asset('web/images/spring_challenges/prizes_list_icons/5.png')}}">
                                    </p>
                                </li>
                                <li class="sc-prizes-item">
                                    <span class="sc-prizes-list-icon"></span>
                                    <p>
                                        6 month online training
                                        <img src="{{asset('web/images/spring_challenges/prizes_list_icons/7.png')}}">
                                    </p>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="sc-video-block-wrapper">
                   {{--     <div id="amazingcarousel-container-1">
                            <div id="amazingcarousel-1"
                                 style="display:none;position:relative;width:100%;max-width:990px;margin:0px auto 0px;">
                                <div class="amazingcarousel-list-container">
                                    <ul class="amazingcarousel-list">
                                        <li class="amazingcarousel-item">
                                            <div class="amazingcarousel-item-container">
                                                <div class="amazingcarousel-image">
                                                    <a href="https://player.vimeo.com/video/264356849"
                                                       title="Rauve workout plan GYM" class="html5lightbox"
                                                       data-group="amazingcarousel-1">
                                                        <img src="https://i.vimeocdn.com/video/644018264.jpg"
                                                             alt="Rauve workout plan GYM"/>
                                                    </a>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>--}}

                        <div class="custom-video-block" style="display: block; position: relative; width: 100%; max-width: 990px; margin: 0px auto; direction: ltr; border-color: #ffffff"> <!--add class  'custom-video-block--red' for red border -->
                            <div class="custom-video-block__inner">

                                <div class="custom-video-block__wrapper-click">
                                    <img src="https://i.vimeocdn.com/video/694117034_640.jpg" alt="mainImage" class="custom-video-block__coverImg">
                                    <img src="{{ asset('web/carouselengine/playvideo-64-64-0.png')}}" alt="" class="custom-video-block__playImg">
                                </div>
                                <iframe src="https://player.vimeo.com/video/264356849" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>

                            </div><!--custom-video-block__inner-->

                        </div><!--custom-video-block-->
                    </div>
                </div>
            </div>
        </div>
        <div class="sc-registration-block-wrapper">
            <div class="wrapper">
                <div class="sc-registration-block">
                    <div class="separate-heading-block">
                        <div class="title-sep-container title-sep-container-left">
                            <div class="title-sep sep-single"></div>
                        </div>
                        <h2 class="separate-heading-title custom-plan-title">
                            Registration
                        </h2>
                        <div class="title-sep-container title-sep-container-right">
                            <div class="title-sep sep-single"></div>
                        </div>
                    </div>
                    <div class="sc-registration-block-content">
                        <div class="schedule-text-block">
                            <p>
                                Registration opens at
                            </p>
                            <p>
                                <strong>
                                    9am: Thursday, April 12
                                    <sup>th</sup>
                                </strong>
                            </p>
                            <p>
                                and will close at
                            </p>
                            <p>
                                <strong>
                                    12:59pm: Wednesday, April 18
                                    <sup>th</sup>
                                </strong>
                            </p>
                        </div>
                        <div class="registration-note-block">
                            <p>
                                Once the registration window has expired
                            </p>
                            <p>
                                NO more participants will be accepted
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="scRegistration" class="sc-how-it-works-block-wrapper">
            <div class="wrapper">
                <div class="sc-how-it-works-block">
                    <div class="separate-heading-block">
                        <div class="title-sep-container title-sep-container-left">
                            <div class="title-sep sep-single"></div>
                        </div>
                        <h2 class="separate-heading-title custom-plan-title">
                            Select your package
                        </h2>
                        <div class="title-sep-container title-sep-container-right">
                            <div class="title-sep sep-single"></div>
                        </div>
                    </div>
                    <div class="sc-products-block-wrapper">
                        <div class="shop-items-wrapper">
                            @foreach($products as $product)
                                <div class="shop-item-wrapper">
                                    <h3 class="sc-bandle-title">

                                        @if(strpos($product->title, 'Maxx'))
                                            Optimal
                                        @elseif (strpos($product->title, 'email'))
                                            Enhanced
                                        @else
                                            Basic
                                        @endif
                                    </h3>
                                    <div class="shop-item">
                                        <div class="image-wrapper">
                                            <a href="#">
                                                <img src="{!! $product->getFirstMediaUrl('preview') !!}"/>
                                                {{--<img src="{{asset('web/images/spring_challenges/custom_meal_workout_plan.png')}}" />--}}
                                            </a>
                                        </div>
                                        <div class="product-details">
                                            <h3 class="product-title">
                                                <a href="#">

                                                    {!! $product->title !!}
                                                </a>
                                            </h3>
                                            <p class="product-category-label">
                                                {!! $product->category !!}

                                            </p>
                                        </div>
                                        <div class="product-price-block">
                                            <div class="product-price">
                                            <span class="product-amount">
                                                <ins>
                                                    ${!! $product->amount !!}
                                                </ins>
                                            </span>
                                            </div>
                                        </div>
                                        <div class="product-button-block">
                                            <div class="add-to-cart-wrapper">
                                                <add-to-cart
                                                        product-slug="{{ $product->slug }}"
                                                        data-title="{{ $product->title }}"
                                                >
                                                </add-to-cart>
                                            </div>
                                        </div>

                                    </div>

                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="sc-rules-regulation-block-wrapper">
            <div class="wrapper">
                <div class="sc-rules-regulation-block">
                    <div class="separate-heading-block">
                        <div class="title-sep-container title-sep-container-left">
                            <div class="title-sep sep-single"></div>
                        </div>
                        <h2 class="separate-heading-title custom-plan-title">
                            Rules and Regulations
                        </h2>
                        <div class="title-sep-container title-sep-container-right">
                            <div class="title-sep sep-single"></div>
                        </div>
                    </div>
                    <div class="sc-rules-regulations-content-wrapper">
                        <div class="sc-rules-regulations-list-wrapper">
                            <ul class="sc-rules-regulations-list">
                                <li class="sc-rules-regulations-list-item">
                                    In order to participate and qualify for the cash prizes you must register in the
                                    designated registration window listed above.
                                </li>
                                <li class="sc-rules-regulations-list-item">
                                    The challenge will run from
                                    <strong>
                                        Monday, April 30
                                        <sup>th</sup>
                                        through Wednesday, May 30
                                        <sup>th</sup>
                                    </strong>
                                    .
                                </li>
                                <li class="sc-rules-regulations-list-item">
                                    All contestants will be judged on their before and after photo submissions. One
                                    photo showing a frontal view and one photo showing a side view.
                                </li>
                                <li class="sc-rules-regulations-list-item">
                                    Before and After photos need to be submitted both in one email to
                                    <a href="mailto:30day@shedyourfat.com">30day@shedyourfat.com</a>
                                    May 31
                                    <sup>st</sup>
                                    - June 2
                                    <sup>nd</sup>
                                    . Anything outside this window will not be accepted.
                                </li>
                                <li class="sc-rules-regulations-list-item">
                                    Winners will be selected by the Shedfat Team and will be determined by what we
                                    consider to be the most drastic, most impressive overall change in body composition
                                    and will be announced at 9pm on Friday, June 8
                                    <sup>th</sup>
                                    .
                                </li>
                            </ul>
                        </div>
                        <div class="sc-rules-regulations-slider-wrapper">
                            <p>
                                Previous Winners
                            </p>
                            <div id="prevWinnersSlider" class="rule-reg-slider">
                                <img src="{{asset('web/images/spring_challenges/prev_winners/win1.jpg')}}"/>
                                <img src="{{asset('web/images/spring_challenges/prev_winners/win 2.jpg')}}"/>
                                <img src="{{asset('web/images/spring_challenges/prev_winners/win 3.jpg')}}"/>
                                <img src="{{asset('web/images/spring_challenges/prev_winners/win 4.jpg')}}"/>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="sc-eligibility-block-wrapper">
            <div class="wrapper">
                <div class="sc-eligibility-block">
                    <div class="separate-heading-block">
                        <div class="title-sep-container title-sep-container-left">
                            <div class="title-sep sep-single"></div>
                        </div>
                        <h2 class="separate-heading-title custom-plan-title">
                            Eligibility For Participation and Cash Prizes
                        </h2>
                        <div class="title-sep-container title-sep-container-right">
                            <div class="title-sep sep-single"></div>
                        </div>
                    </div>
                    <div class="sc-eligibility-content-wrapper">
                        <p>
                            In order to participate you must be 18 years of age or older.
                        </p>
                        <p>
                            You must register within the designated registration window listed above.
                        </p>
                        <p>
                            In order to qualify for cash prizes, you must take your before photo
                            <br>
                            holding a newspaper dated April 30
                            <sup>th</sup>
                            and you must take your after photo
                            <br>
                            holding a newspaper dated May 30
                            <sup>th</sup>
                            .
                        </p>
                        <p>
                            <strong>* For current Shedfat clients</strong>
                            – in order to participate and to qualify
                            <br>
                            for cash prizes, you will be required to register for the challenge
                            <br>
                            following the same protocol listed above.
                        </p>
                        <a class="sc-register-button" href="#scRegistration">
                            Register
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <div class="popUp popUp--challenge" data-modal="SPRING CHALLENGE"><!-- popUp--open -->
        <input type="hidden" class="add-to-cart-btn callPopUp" data-title='SPRING CHALLENGE'>
        <div class="popUp__wrapper">
            <button type="button" class="popUp__close" data-dismiss="modal">×</button>

            <div class="popUp__img-info">
                <div class="popUp__img">

                </div>
                <div class="popUp__info">
                    <div class="popUp__name">SPRING CHALLENGE</div>
                    <p class="popUp__description">Get on the list and we will keep you in the loop on upcoming 2018
                        challenges.</p>

                    <form action="{{ route('subscribe.challenge') }}" method="POST" class="popUp__form">
                        {{ csrf_field() }}
                        <input type="text" name="name" placeholder="Your First Name" required>
                        <input type="email" name="email" placeholder="Your Email Address" required>
                        <button class="btn popUp__form-btn-submit">submit</button>
                    </form>


                </div>
            </div>
        </div>
    </div>

@endsection

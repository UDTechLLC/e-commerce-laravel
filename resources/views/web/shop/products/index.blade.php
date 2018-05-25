@extends('web.layouts.app')
@section('title')
    Shop -@parent
@endsection
@section('content')
    <main>
        <div class="main">
            {{--<div class="wrapper" style="background-color: #efea48;text-align: center;margin-top: -20px;">--}}
            {{--<h3 style="padding: 15px;">60% OFF <span style="font-weight: lighter;">THE ENTIRE STORE</span></h3></div>--}}
            {{--<div class="shop-grid-wrapper" style="margin-top: -50px;">--}}
            <div class="wrapper">
                <div class="shop-items-wrapper">

                    @foreach($products as $product)

                        <div class="shop-item">
                            <div class="image-wrapper">
                                <a href="{{url('product/'.$product->slug)}}">
                                    <img src="{!! $product->getFirstMediaUrl('preview') !!}"/>
                                </a>
                            </div>
                            <div class="product-details" style="width: 100%;">
                                <h2 class="product-title" style="text-align: center !important;">
                                    <a href="{{url('product/'.$product->slug)}}">
                                        {!! $product->title !!} </a>
                                </h2>
                                @if($product -> category)
                                    <p class="product-category-label"> {{ $product->category }} </p>
                                @endif

                            </div>
                            <div class="product-price-block">
                                <div class="product-price">
									<span class="product-amount" style="display: flex;justify-content: center">
                                         {{--@if($products -> category)--}}
                                        {{--<p>Category {{ $product->category }}</p>--}}
                                        {{--@endif--}}
                                        @if($product->old_amount>0)
                                            <del>
                                            ${{$product->old_amount}}
                                        </del>
                                        @endif
                                        <ins>
                                            ${{$product->amount}}
                                        </ins>
									</span>
                                </div>
                            </div>

                            <div class="product-button-block">
                                <div class="add-to-cart-wrapper">
                                    <add-to-cart
                                            product-slug="{{ $product->slug }}"
                                            data-title="{{ $product->slug }}"
                                    >
                                        {{--@if($product->slug == 'resistance-bands') pre-order @endif--}}
                                    </add-to-cart>
                                </div>
                            </div>
                        </div>
                        {{--<add-to-cart--}}
                        {{--product-slug="{{ $product->slug }}"--}}
                        {{-->--}}
                        {{--</add-to-cart>--}}
                        {{--</div>--}}

                        {{-- Partial file name should be as slug --}}
                        @if ($product->bandls)
                            @if (View::exists('web.partials.include.popups.' .$product->slug))
                                @include('web.partials.include.popups.' .$product->slug, [
                                    'product' => $product->bandls
                                    ])
                            @endif
                        @endif
                    @endforeach
                    <div class="shop-item">
                        <div class="image-wrapper">
                            <a href="#">
                                <img src="{{ asset('web/images/icon_Shedfat Dad Hat Sales.jpg')}}"/>
                            </a>
                        </div>
                        <div class="product-details" style="padding-top: 28px;width: 100%">
                            <h3 class="product-title" style="text-align: center">
                                <a href="#">
                                    Shedfat Dad Hat
                                </a>
                            </h3>
                        </div>
                        <div class="product-price-block">
                            <div class="product-price">
                                        <span class="product-amount">

                                        </span>
                            </div>
                        </div>
                        <div class="product-button-block">
                            <div class="add-to-cart-wrapper">
                                <a class="add-to-cart-btn" href="javascript:void(0)" data-title="Shedfat Dad Hat">
                                    Register
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="shop-item">
                        <div class="image-wrapper">
                            {{-- <a href="{{url('challenge')}}">--}}
                            <a href="#scRegistration">
                                <img src="{{ asset('web/images/Spring Challenge_icon.jpg') }}"/>
                            </a>
                        </div>
                        <div class="product-details" style="padding-top: 10px;width: 100%">
                            <h3 class="product-title" style="text-align: center">
                                <a href="#scRegistration">
                                    {{--  <a href="{{url('challenge')}}">--}}
                                    Spring Challenge </a>
                            </h3>
                        </div>
                        <div class="product-button-block">
                            <div class="add-to-cart-wrapper">
                                <a class="add-to-cart-btn" href="#scRegistration" data-title='SPRING CHALLENGE'>
                                    Register
                                </a>
                                {{--<a class="add-to-cart-btn"  href="{{url('challenge')}}">
                                    Register
                                </a>--}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </main>
    <div class="popUp" data-modal="bogo-12week-custom-meal-plan"><!-- popUp--open -->
        <div class="popUp__wrapper">
            <button type="button" class="popUp__close" data-dismiss="modal">×</button>
            <h2 class="popUp__title">FREE GIFT INCLUDED</h2>
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
                        <div class="btns-add-to-thanks flex flex-a--center flex-j--between">
                            <a class="add-to-cart-btn" href="/cart">
                                View cart
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{--<div class="popUp" data-modal="12week-custom-meal-plan"><!-- popUp--open -->--}}
        {{--<div class="popUp__wrapper">--}}
            {{--<button type="button" class="popUp__close" data-dismiss="modal">×</button>--}}
            {{--<h2 class="popUp__title">ALSO RECOMMENDED</h2>--}}
            {{--<div class="popUp__img-info">--}}
                {{--<div class="popUp__img">--}}
                    {{--<img src="{{asset('web/images/popUp/icon_12_week_custom_meal_plan (2).png')}}"--}}
                         {{--alt="product_icon">--}}
                {{--</div>--}}
                {{--<div class="popUp__info">--}}
                    {{--<div class="popUp__name">12 Week Custom Training Plan</div>--}}
                    {{--<p class="popUp__description">Proper diet is key to achieving your health and fitness goals.--}}
                        {{--A 100% customized training plan will make you look better, feel better and maximize results!</p>--}}

                    {{--<div class="popUp__productPriceBlock">--}}


                        {{--<div class="product-price-block">--}}
                            {{--<div class="product-price has-old-price">--}}
                                {{--<div class="product-amount product-amount--old">--}}
                                    {{--<span class="currency">$</span>--}}
                                    {{--<span>125.00</span>--}}
                                {{--</div>--}}
                                {{--<div class="product-amount">--}}
                                    {{--<span class="currency">$</span>--}}
                                    {{--<span>30.00</span>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}

                    {{--</div>--}}
                    {{--<div class="btns-add-to-thanks flex flex-a--center flex-j--between">--}}
                        {{--<add-to-cart--}}
                                {{--product-slug="12-week-custom-training-plan+12week-custom-meal-plan"--}}
                        {{-->--}}
                        {{--</add-to-cart>--}}
                        {{--<a href="#" class="no-thanks">NO, THANKS</a>--}}

                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
    <div class="popUp" data-modal="bogo-12week-custom-training-plan"><!-- popUp--open -->
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
                            <a class="add-to-cart-btn" href="/cart">
                                View cart
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{--<div class="popUp" data-modal="12week-custom-training-plan"><!-- popUp--open -->--}}
        {{--<div class="popUp__wrapper">--}}
            {{--<button type="button" class="popUp__close" data-dismiss="modal">×</button>--}}
            {{--<h2 class="popUp__title">ALSO RECOMMENDED</h2>--}}
            {{--<div class="popUp__img-info">--}}
                {{--<div class="popUp__img">--}}
                    {{--<img src="{{asset('web/images/popUp/icon_12_week_custom_training_plan (3).png')}}"--}}
                         {{--alt="product_icon">--}}
                {{--</div>--}}
                {{--<div class="popUp__info">--}}
                    {{--<div class="popUp__name">12 Week Custom Meal Plan</div>--}}
                    {{--<p class="popUp__description">Training is only 20% of the battle. 80% of results come from--}}
                        {{--consistent and proper nutrition!</p>--}}

                    {{--<div class="popUp__productPriceBlock">--}}

                        {{--<div class="product-price-block">--}}
                            {{--<div class="product-price has-old-price">--}}
                                {{--<div class="product-amount product-amount--old">--}}
                                    {{--<span class="currency">$</span>--}}
                                    {{--<span>125.00</span>--}}
                                {{--</div>--}}
                                {{--<div class="product-amount">--}}
                                    {{--<span class="currency">$</span>--}}
                                    {{--<span>30.00</span>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}

                    {{--</div>--}}
                    {{--<div class="btns-add-to-thanks flex flex-a--center flex-j--between">--}}
                        {{--<add-to-cart--}}
                                {{--product-slug="12-week-custom-meal-plan+12-week-custom-training-plan"--}}
                        {{-->--}}
                        {{--</add-to-cart>--}}
                        {{--<a href="#" class="btn add-to-cart-btn">ADD TO CART</a>--}}{{----}}{{----}}
                         {{--<a href="#" class="no-thanks">NO, THANKS</a>--}}
                     {{--</div>--}}
                     {{----}}{{----}}{{--<a href="#" class="learn-more">learn more</a>--}}
                        {{--<a href="#" class="no-thanks">NO, THANKS</a>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
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
    <div class="popUp popUp-register popUp-register--dad-hat" data-modal="Shedfat Dad Hat"><!-- popUp--open -->
        <!--   <input type="hidden" class="add-to-cart-btn callPopUp" data-title='Shedfat Dad Hat'>-->
        <div class="popUp__wrapper">
            <button type="button" class="popUp__close" data-dismiss="modal">×</button>

            <div class="popUp__img-info">
                <div class="popUp__img">

                </div>
                <div class="popUp__info">
                    <div class="popUp__name">Be the first to know
                        when its Available
                    </div>
                    <form action="{{ route('subscribe.dadhat') }}" method="POST" class="popUp__form">
                        {{ csrf_field() }}
                        <input type="text" name="name" placeholder="Your First Name" required>
                        <input type="email" name="email" placeholder="Your Email Adress" required>
                        <button class="btn popUp__form-btn-submit">submit</button>
                    </form>


                </div>
            </div>
        </div>
    </div>
@endsection

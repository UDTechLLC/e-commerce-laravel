@extends('web.layouts.app')
@section('title')
    Shop -@parent
@endsection
@section('content')
    <main>
<div class="main">
        <div class="shop-grid-wrapper">
            <div class="wrapper">
                <div class="shop-items-wrapper">

            @foreach($products as $product)

                        <div class="shop-item">
                            <div class="image-wrapper">
                                <a href="{{url('product/'.$product->slug)}}">
                                    <img src="{!! $product->getFirstMediaUrl('preview') !!}" />
                                </a>
                            </div>
                            <div class="product-details">
                                <h2 class="product-title">
                                    <a href="{{url('product/'.$product->slug)}}">
                                    {!! $product->title !!} </a>
                                </h2>
                                @if($product -> category)
                                    <p class="product-category-label"> {{ $product->category }} </p>
                                @endif

                            </div>
                            <div class="product-price-block">
                                <div class="product-price">
									<span class="product-amount">
                                         {{--@if($products -> category)--}}
                                        {{--<p>Category {{ $product->category }}</p>--}}
                                        {{--@endif--}}
                                        @if($product->old_amount)
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
                                    data-title="{{ $product->title }}"
                                    >
                                    </add-to-cart>
                                </div>
                            </div>
                        </div>
                            {{--<add-to-cart--}}
                                    {{--product-slug="{{ $product->slug }}"--}}
                            {{-->--}}
                            {{--</add-to-cart>--}}
                        {{--</div>--}}
            @endforeach
                <div class="shop-item">
                    <div class="image-wrapper">
                        {{--<a href="{{url('challenge')}}">--}}
                        <a href="#scRegistration">
                            <img src="{{ asset('web/images/Spring_Challenge_icon.png') }}" />
                        </a>
                    </div>
                    <div class="product-details" style="padding-top: 10px;">
                        <h2 class="product-title">
                            <a  href="#scRegistration">
                            {{--<a href="{{url('challenge')}}">--}}
                                Spring Challenge </a>
                        </h2>
                    </div>

                    <div class="product-button-block">
                        <div class="add-to-cart-wrapper">
                            <div class="product-button-block">
                                <div class="add-to-cart-wrapper">
                                    <a class="add-to-cart-btn"  href="#scRegistration" data-title='SPRING CHALLENGE'>
                                        Register
                                    </a>
                                    {{--<a class="add-to-cart-btn"  href="{{url('challenge')}}" data-title='SPRING CHALLENGE'>
                                        Register
                                    </a>--}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </div>
        </div>
    </div>

    </main>
    <div class="popUp" data-modal="12 Week Custom Meal Plan"><!-- popUp--open -->
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
    </div>

    <div class="popUp" data-modal="12 Week Custom Training Plan"><!-- popUp--open -->
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
    </div>
    <div class="popUp popUp--challenge" data-modal="SPRING CHALLENGE"><!-- popUp--open -->
        <input type="hidden" class="add-to-cart-btn callPopUp" data-title='SPRING CHALLENGE'>
        <div class="popUp__wrapper">
            <button type="button" class="popUp__close" data-dismiss="modal">×</button>

            <div class="popUp__img-info">
                <div class="popUp__img">

                </div>
                <div class="popUp__info">
                    <div class="popUp__name">SPRING CHALLENGE</div>
                    <p class="popUp__description">Get on the list and we will keep you in the loop on upcoming 2018 challenges.</p>

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

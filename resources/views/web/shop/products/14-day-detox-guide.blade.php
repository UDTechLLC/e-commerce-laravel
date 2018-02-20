@extends('web.layouts.app')
@section('content')
<main>
    <div class="top-product-description-block">
        <div class="wrapper">
            <div class="product-preview-wrapper">
                <div class="image-wrapper">
                    {{--<img src="assets/images/full-product/14-day-detox-guide/top_product_image.png">--}}
                    <img src="{!! $product->getFirstMediaUrl('products') !!}" />
                </div>
            </div>
            <div class="product-info-block">
                <div class="product-info">
                    <div class="product-title-block">
                        <h2 class="product-title">
                            {{--14 DAY DETOX SMOOTHIE--}}
                            {{--CLEANSE--}}
                            {!! $product->title !!}
                        </h2>
                    </div>
                    <div class="product-description-block">
                        <p class="product-description">
                            {{--The Power of Juice! This is the fast lane on the health highway. Whether you are looking to lose weight, boost mental function--}}
                            {{--or feel lighter on your feet juicing can help get you there!--}}
                            {!! $product->description !!}
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

    <section class="section__wrapper detox-section">
        <div class="wrapper">
            <h2 class="section__title">WHY SHOULD I DETOX?</h2>
            <div class="flex flex-j--between detox-section__wrapper">
                <div class="detox-section__block">

                    <div class="inline-block">
                        <div class="detox-section__item">
                            <div class="section__icon-img">
                                <img src="{{ asset('web/images/full-product/14-day-detox-guide/icon-weight-loss.svg')}}" alt="icon-weight-loss">
                            </div>
                            <p class="section__info">Weight Loss</p>
                        </div>

                        <div class="detox-section__item">
                            <div class="section__icon-img">
                                <img src="{{ asset('web/images/full-product/14-day-detox-guide/improved-complexion.svg')}}" alt="improved-complexion">
                            </div>
                            <p class="section__info">
                                Improved <br>
                                Complexion
                            </p>
                        </div>
                        <div class="detox-section__item">
                            <div class="section__icon-img">
                                <img src="{{ asset('web/images/full-product/14-day-detox-guide/absorption.svg')}}" alt="absorption">
                            </div>
                            <p class="section__info">
                                More Efficient <br>
                                Nutrient <br> Absorption
                            </p>
                        </div>
                        <div class="detox-section__item">
                            <div class="section__icon-img">
                                <img src="{{ asset('web/images/full-product/14-day-detox-guide/enhanced-mood.svg')}}" alt="enhanced-mood">
                            </div>
                            <p class="section__info">
                                Enhanced Mood
                            </p>
                        </div>
                        <div class="detox-section__item">
                            <div class="section__icon-img">
                                <img src="{{ asset('web/images/full-product/14-day-detox-guide/increased-energy.svg')}}" alt="increased-energy">
                            </div>
                            <p class="section__info">
                                Increased Energy
                                Levels
                            </p>
                        </div>
                        <div class="detox-section__item">
                            <div class="section__icon-img">
                                <img src="{{ asset('web/images/full-product/14-day-detox-guide/improve-digestion.svg')}}" alt="improve-digestion">
                            </div>
                            <p class="section__info">
                                More Efficient
                                Digestion
                            </p>
                        </div>
                    </div>
                </div>
                <div class="detox-section__block detox-section__block--right">
                    <img src="{{ asset('web/images/full-product/14-day-detox-guide/why-detox.png')}}" alt="why-detox">
                </div>
            </div>
        </div>
    </section>
</main>


<!--fixed btn add to card-->
<a href="#" class="btn add-to-cart-btn add-to-cart-btn--mobile">ADD TO CART</a>
<!-- //// fixed btn add to card-->

    @endsection
@extends('web.layouts.app')
@section('content')
    <main>

        <div class="top-product-description-block">
            <div class="wrapper">
                <div class="product-preview-wrapper">
                    <div class="image-wrapper">
                        <img src="{!! $product->getFirstMediaUrl('products') !!}">
                    </div>
                </div>
                <div class="product-info-block">
                    <div class="product-info">
                        <div class="product-title-block">
                            <h2 class="product-title">

                                {!! $product->title !!}
                            </h2>
                        </div>
                        <div class="product-description-block">
                            <p class="product-description">
                                {!! $product->description !!}
                                {{--SHEDFAT MAXX is a weight loss supplement formulated with premium ingredients to increase your weight loss, provide clean smooth energy and help you get past your fitness plateaus.--}}
                            </p>
                        </div>
                        <div class="product-price-block">
                            <div class="product-price">
                            <span class="product-amount">
                                <span class="currency">$</span>
                                <span>  {!! $product->amount !!}</span>
                            </span>
                            </div>
                        </div>
                        <div class="product-button-block">
                            <div class="flex flex-a--center">

                                <div class="btn-wrapper-product-count flex flex-a--center">
                                    <button class="btn">-</button>
                                    <input type="number" class="product-count" value="1">
                                    <button class="btn">+</button>
                                </div>

                                <div class="add-to-cart-wrapper">
                                    <a class="add-to-cart-btn" href="#">
                                        Add to cart
                                    </a>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="clear"></div>
            </div>
        </div>

        <section class="section__wrapper">
            <div class="wrapper">

            </div>
        </section>
    </main>


    <!--fixed btn add to card-->
    <a href="#" class="btn add-to-cart-btn add-to-cart-btn--mobile">ADD TO CART</a>
    <!-- //// fixed btn add to card-->
    @endsection
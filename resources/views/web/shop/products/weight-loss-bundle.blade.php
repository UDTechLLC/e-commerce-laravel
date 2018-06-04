@extends('web.layouts.app')
@section('title')
    {!! $product->title !!} -@parent
@endsection
@section('content')
    <main>
        <div class="top-product-description-block">
            <div class="wrapper">
                <div class="product-preview-wrapper">
                    <div class="image-wrapper">
                        <img src="{!! $product->getFirstMediaUrl('products') !!}"/>
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
                            </p>
                            <ul class="product-description-list check-icon-list mobile-center-width">
                                <li class="product-description-list-item">
                                    <i class="fas fa-check"></i>
                                    30 Day Customized Meal Plan
                                </li>
                                <li class="product-description-list-item">
                                    <i class="fas fa-check"></i>
                                    30 Day Customized Training Plan
                                </li>
                                <li class="product-description-list-item">
                                    <i class="fas fa-check"></i>
                                    30 Day Supply of Shedfat Maxx
                                </li>
                                <li class="product-description-list-item">
                                    <i class="fas fa-check"></i>
                                    FREE BONUS #1-What To Eat In The Streets Guide
                                </li>
                                <li class="product-description-list-item">
                                    <i class="fas fa-check"></i>
                                    FREE BONUS #2-Shedfat Gym Bag
                                </li>
                            </ul>
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
                        @include('web.shop.partials.free_shipping')
                        @if($product->slug == 'Fat-Loss-Bundle')
                            <div class="product-button-block">
                                <div class="add-to-cart-wrapper">
                                    <div class="product-button-block">
                                        <div class="add-to-cart-wrapper">
                                            <a class="disabled-button">
                                                Sold out
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @else
                            <add-to-cart
                                    product-slug="{{ $product->slug }}">
                            </add-to-cart>
                        @endif
                    </div>
                </div>
                <div class="clear"></div>
            </div>
        </div>
        <section class="limited-opportunity">
            <div class="wrapper">
                <div class="separate-heading-block">
                    <div class="title-sep-container title-sep-container-left">
                        <div class="title-sep sep-single"></div>
                    </div>
                    <h2 class="separate-heading-title custom-plan-title">
                        LIMITED OPPORTUNITY
                    </h2>
                    <div class="title-sep-container title-sep-container-right">
                        <div class="title-sep sep-single"></div>
                    </div>
                </div>
                <div class="section__text-wrapper">
                    <p class="section__text text-center">
                        Here is a chance for you to capitalize and really get the best bang for your buck! It is
                        impossible to put a price on looking great, feeling amazing and achieving the goals that you
                        have set out to achieve… but that does not mean we will not do our best to make it affordable!
                    </p>
                </div>
                <div class="limited-opportunity__products-wrapper">
                    <div class="limited-opportunity__product-item">
                        <div class="image-wrapper">
                            <img src="{{ asset('web/images/limited_opportunity/lo-30day.jpg')}}"/>
                        </div>
                        <div class="limited-opportunity__product-description">
                            <p><b>
                                    Properly Fuel Your Transformation!
                                </b></p>
                        </div>
                    </div>
                    <div class="limited-opportunity__product-item">
                        <div class="image-wrapper">
                            <img src="{{ asset('web/images/limited_opportunity/lo-30dayCmp.jpg')}}"/>
                        </div>
                        <div class="limited-opportunity__product-description">
                            <p><b>
                                    Re-Program Your Body!</b>
                            </p>
                        </div>
                    </div>
                    <div class="limited-opportunity__product-item">
                        <div class="image-wrapper">
                            <img src="{{ asset('web/images/limited_opportunity/lo-shf.jpg')}}"/>
                        </div>
                        <div class="limited-opportunity__product-description">
                            <p><b>
                                    Our All Natural Boost!</b>
                            </p>
                        </div>
                    </div>
                    <div class="limited-opportunity__product-item">
                        <div class="image-wrapper">
                            <img src="{{ asset('web/images/limited_opportunity/lo-wte.jpg')}}"/>
                        </div>
                        <div class="limited-opportunity__product-description">
                            <p><b>
                                    No Meal Prep? No Problem!</b>
                            </p>
                        </div>
                    </div>
                    <div class="limited-opportunity__product-item">
                        <div class="image-wrapper">
                            <img src="{{ asset('web/images/limited_opportunity/lo-shfbag.jpg')}}"/>
                        </div>
                        <div class="limited-opportunity__product-description">
                            <p><b>
                                    Compact and Convenient Carrying</b>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section>
            <div class="training-plan-faqs-block-wrapper">
                <div class="wrapper">

                    <div class="flex flex-a--center flex--m-block">


                        <div class="video-block-wrapper">
                            @if($product->getFirstMedia('products')->getCustomProperty('view_video') != "")
                                <div class="custom-video-block custom-video-block--red">
                                    <!--add class  'custom-video-block--red' for red border -->
                                    <div class="custom-video-block__inner">

                                        <div class="custom-video-block__wrapper-click">
                                            <img src="{{ asset('web/images/new-images/cap.png')}}" alt="mainImage"
                                                 class="custom-video-block__coverImg">
                                            <img src="{{ asset('web/carouselengine/playvideo-64-64-0.png')}}" alt=""
                                                 class="custom-video-block__playImg">
                                        </div>


                                        <iframe src="{{ $product->getFirstMedia('products')->getCustomProperty('view_video') }}"
                                                frameborder="0" webkitallowfullscreen mozallowfullscreen
                                                allowfullscreen></iframe>

                                    </div><!--custom-video-block__inner-->

                                </div><!--custom-video-block-->
                            @endif
                        </div>

                        <div class="get-more__text">
                            <img src="{{ asset('web/images/limited_opportunity/lettering.svg')}}"
                                 alt="get-more">
                        </div>


                    </div>


                    <div class="training-plan-faqs-block">


                    </div>
                    <div class="clear"></div>
                </div>
            </div>
        </section>

    </main>
    @if(!$product->slug == 'Fat-Loss-Bundle')
        <add-to-cart-mobile
                product-slug="{{ $product->slug }}"
        >
        </add-to-cart-mobile>
    @endif

@endsection

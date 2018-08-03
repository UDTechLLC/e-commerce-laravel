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
                            <h2 class="product-title custom-w">
                                {!! $product->title !!}
                            </h2>
                        </div>
                        <div class="product-description-block">
                            <p class="product-description">
                                {!! $product->description !!}
                            </p>
                            <ul class="product-description-list check-icon-list">
                                @foreach($checkMark as $mark)
                                    <li class="product-description-list-item">
                                        <i class="fas fa-check"></i>
                                        {{$mark->title}}
                                    </li>
                                @endforeach
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
                        <add-to-cart
                                product-slug="{{ $product->slug }}"
                        >
                        </add-to-cart>
                    </div>
                </div>
                <div class="clear"></div>
            </div>
        </div>

        <section class="section__wrapper detox-section green-page-section">
            <div class="wrapper">
                <div class="flex flex-j--between detox-section__wrapper">
                    <div class="detox-section__block green-page-section__block">
                        <h2 class="section__title">WHY SHOULD I DETOX?</h2>
                        <div class="inline-block">
                            <div class="detox-section__item green-page-section__item">
                                <div class="section__icon-img">
                                    <img src="{{ asset('web/images/full-product/green_page/Revitalize.svg')}}" alt="icon-weight-loss">
                                </div>
                                <p class="section__info">
                                    Revitalize
                                </p>
                            </div>

                            <div class="detox-section__item green-page-section__item">
                                <div class="section__icon-img">
                                    <img src="{{ asset('web/images/full-product/green_page/Repair.svg')}}" alt="improved-complexion">
                                </div>
                                <p class="section__info">
                                    Repair
                                </p>
                            </div>
                            <div class="detox-section__item green-page-section__item">
                                <div class="section__icon-img">
                                    <img src="{{ asset('web/images/full-product/green_page/Replenish.svg')}}" alt="absorption">
                                </div>
                                <p class="section__info">
                                    Replenish
                                </p>
                            </div>
                            <div class="detox-section__item green-page-section__item">
                                <div class="section__icon-img">
                                    <img src="{{ asset('web/images/full-product/green_page/Re-Energize.svg')}}" alt="enhanced-mood">
                                </div>
                                <p class="section__info">
                                    Re-Energize
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="detox-section__block green-page-section__block detox-section__block--right">
                        <img src="{{ asset('web/images/full-product/14-day-detox-guide/supplement_fasts_image.png')}}" alt="Supplement Facts" />
                    </div>
                </div>
            </div>
        </section>

        <section style="background: #f5f3f3;">
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
                            <img src="{{ asset('web/images/full-product/text_images/8.svg')}}"
                                 alt="get-more">
                        </div>


                    </div>


                    <div class="training-plan-faqs-block">


                    </div>
                    <div class="clear"></div>
                </div>
            </div>
        </section>
        <section style="background: #ffffff;" class="grey-section section__wrapper green-page-benefits-section">
            <div class="wrapper">
                <div class="flex flex-j--between flex--m-block">
                    <div class="block-50 m-block-100">
                        <div class="section__img section__img--detox section__img__green_page">
                            <img src="{{ asset('web/images/full-product/detox.png')}}"
                                 alt="benefits">
                        </div>
                    </div>
                    <div class="block-50 m-block-100">
                        <h2 class="section__title section__title--detox">BENEFITS OF THE
                            SHEDFAT DETOX GREENS</h2>
                        <p class="section__text section__text--detox">
                            Many people struggle to consume the appropriate amounts of vitamins, minerals and other plant based micro-nutrients required for optimal health.
                            <br><br>
                            Shedfat Detox is an excellent way to enhance energy levels while helping to rid the body of stores of harmful toxins. </p>
                    </div>
                </div>
            </div>
        </section>


    </main>


    <add-to-cart-mobile
            product-slug="{{ $product->slug }}"
    >
    </add-to-cart-mobile>

@endsection

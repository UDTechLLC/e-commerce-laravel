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
                        <div class="product-price-block product-price-block--radio">
                            {{--<div class="product-price">--}}
                            {{--<span class="product-amount">--}}
                            {{--<span class="currency">$</span>--}}
                            {{--<span>  {!! $product->amount !!}</span>--}}
                            {{--</span>--}}
                            {{--</div>--}}
                            <div class="price-radio-block">

                                <label class="price-radio flex flex-a--center">
                                    <input type="radio" value="34.00" name="product-price" checked>
                                    <span class="custom-input"></span>
                                    <span class="product-amount">
                                        <span class="currency">$</span>
                                        <span>{!! $product->amount !!}</span>
                                    </span>


                                    <span class="price-radio-block__desc">
                                        I want to make a one-time purchase.
                                    </span>

                                </label>
                                <label class="price-radio flex flex-a--center">
                                    <input type="radio" value="59.99" name="product-price">
                                    <span class="custom-input"></span>
                                    <span>
                                    <span class="old-price">
                                        <span class="currency">$</span>
                                        <span>{!! $product->old_amount !!}</span>
                                    </span>
                                    <span class="product-amount">
                                        <span class="currency">$</span>
                                        <span>{!! $product->amount !!}</span>
                                    </span>
                                </span>

                                    <span class="price-radio-block__desc">
                                        I want auto-shipping for every 30 days.
                                </span>
                                </label>
                            </div>

                        </div>
                        <div class="product-button-block">
                            <div class="flex flex-a--center wrapper-btns-buy-count">

                                <div class="btn-wrapper-product-count flex flex-a--center">
                                    <button class="btn">-</button>
                                    <input type="number" class="product-count" value="1">
                                    <button class="btn">+</button>
                                </div>

                                <div class="add-to-cart-wrapper">
                                    @include('web.shop.partials.free_shipping')
                                    <add-to-cart
                                            product-slug="{{ $product->slug }}"
                                    >
                                    </add-to-cart>

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
                <h2 class="section__title after-lines after-lines--large2 after-lines--red  text-center">
                    INGREDIENTS
                </h2>

                <div class="flex flex-j--between ingredients">
                    <div class="ingredients__item">
                        <div class="ingredients__img">
                            <img src="{{ asset('web/images/full-product/shedfat-maxx/green-coffee.png')}}"
                                 alt="green-coffee">
                        </div>
                        <div class="ingredients__text">
                            <span>Green Coffee</span>
                        </div>
                    </div>
                    <div class="ingredients__item">
                        <div class="ingredients__img">
                            <img src="{{ asset('web/images/full-product/shedfat-maxx/caffeine.png')}}" alt="caffeine">
                        </div>
                        <div class="ingredients__text">
                            <span>Caffeine Anhydrous</span>
                        </div>
                    </div>
                    <div class="ingredients__item">
                        <div class="ingredients__img">
                            <img src="{{ asset('web/images/full-product/shedfat-maxx/extract.png')}}" alt="extract">
                        </div>
                        <div class="ingredients__text">
                            <span>Coleus Root Extract</span>
                        </div>
                    </div>
                    <div class="ingredients__item">
                        <div class="ingredients__img">
                            <img src="{{ asset('web/images/full-product/shedfat-maxx/L-Theanine.png')}}"
                                 alt="L-Theanine">
                        </div>
                        <div class="ingredients__text">
                            <span>L-Theanine</span>
                        </div>
                    </div>
                    <div class="ingredients__item">
                        <div class="ingredients__img">
                            <img src="{{ asset('web/images/full-product/shedfat-maxx/salvia.png')}}" alt="alvia">
                        </div>
                        <div class="ingredients__text">
                            <span>Salvia Root Extraсt</span>
                        </div>
                    </div>
                    <div class="ingredients__item">
                        <div class="ingredients__img">
                            <img src="{{ asset('web/images/full-product/shedfat-maxx/yohimbe.png')}}" alt="yohimbe">
                        </div>
                        <div class="ingredients__text">
                            <span>Yohimbe Bark Extract</span>
                        </div>
                    </div>
                </div>


                <table class="ingredients__table" cellspacing="0">
                    <thead>
                    <tr>
                        <td>Ingredients</td>
                        <td>Amount Per Serving</td>
                        <td>% Daily Value</td>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>
                            <b>Green Coffee Bean Extract</b>
                            (Coffee Canephora robusta) 45% CA
                        </td>
                        <td>200 mg</td>
                        <td>*</td>
                    </tr>
                    <tr>
                        <td>
                            <b>Caffeine Anhydrous</b>
                        </td>
                        <td>125 mg</td>
                        <td>*</td>
                    </tr>
                    <tr>
                        <td>
                            <b>Coleus Root Extract</b>
                            (as Coleus Forskohlii)
                        </td>
                        <td>50 mg</td>
                        <td>*</td>
                    </tr>
                    <tr>
                        <td>
                            <b>L-Theanine</b>
                        </td>
                        <td>50 mg</td>
                        <td>*</td>
                    </tr>
                    <tr>
                        <td>
                            <b>Salvia Root Extraсt</b>
                            (as Salvia miltiorrhiza) 7% Salvianoic Acid
                        </td>
                        <td>25 mg</td>
                        <td>*</td>
                    </tr>
                    <tr>
                        <td>
                            <b>Yohimbe Bark Extract</b>
                            (as Pausinystalia Yohimbe) 6% Yohimbine
                        </td>
                        <td>20 mg</td>
                        <td>*</td>
                    </tr>
                    </tbody>
                </table>
                <span class="ingredients__table-info">* % DV not established</span>

                <div class="flex flex-j--between ingredients__other-wrapper">
                    <div class="ingredients__other-item">
                        <h3 class="ingredients__other-title">Other Ingredients</h3>
                        <p class="ingredients__other-text">Magnesium stearate & Silicon Dioxide, Hypromellose (Vegetable
                            Shell).</p>


                        <h3 class="ingredients__other-title">Additional Information</h3>
                        <p class="ingredients__other-text">These statements have not been evaluated by the Food and Drug
                            Administration. This product is not intended to diagnoze, treat, cure, or prevent any
                            disease.</p>
                    </div>
                    <div class="ingredients__other-item">
                        <div class="ingredients__other-line"></div>
                    </div>
                    <div class="ingredients__other-item">
                        <div class="ingredients__other-label">
                            SERVING SIZE 1 CAPSULE
                        </div>
                        <div class="ingredients__other-label">
                            SERVING PER CONTAINER 60
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
                            <div class="video-block">
                                <div id="amazingcarousel-container-1">
                                    <div id="amazingcarousel-1"
                                         style="display: block; position: relative; width: 100%; max-width: 990px; margin: 0px auto; direction: ltr;">
                                        <div class="amazingcarousel-list-container"
                                             style="position: relative; margin: 0px auto; overflow: visible;">
                                            <div class="amazingcarousel-list-wrapper" style="overflow: hidden;">
                                                <div class="amazingcarousel-list-wrapper" style="overflow: hidden;">
                                                    <ul class="amazingcarousel-list"
                                                        style="display: block; position: relative; list-style-type: none; list-style-image: none; background-image: none; background-color: transparent; padding: 0px; margin: 0px;">
                                                        <li class="amazingcarousel-item amazingcarousel-item-0"
                                                            style="display: block; position: relative; background-image: none; background-color: transparent; margin: 0px; padding: 0px; float: left;">
                                                            <div class="amazingcarousel-item-container"
                                                                 style="position: relative; margin: 0px 4px;">
                                                                <div class="amazingcarousel-image border-red">
                                                                    <a href="https://player.vimeo.com/video/247015617"
                                                                       title="Rauve workout plan GYM"
                                                                       class="html5lightbox"
                                                                       data-group="amazingcarousel-1"><img
                                                                                src="{{ asset('web/images/full-product/shedfat-maxx/672144082_640.jpg')}}"
                                                                                alt="Rauve workout plan GYM"></a>
                                                                    <div class="amazingcarousel-play-video"
                                                                         style="position:absolute;left:0;top:0;width:100%;height:100%;cursor:pointer;background-image:url('/assets/carouselengine/playvideo-64-64-0.png');background-repeat:no-repeat;background-position:center center;"></div>
                                                                    <div class="amazingcarousel-play-video"
                                                                         style="position:absolute;left:0;top:0;width:100%;height:100%;cursor:pointer;background-image:url('http://localhost:5000/assets/carouselengine/playvideo-64-64-0.png');background-repeat:no-repeat;background-position:center center;"></div>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <div style="clear:both;"></div>
                                                        <div style="clear:both;"></div>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="get-more__text">
                            <img src="{{ asset('web/images/full-product/shedfat-maxx/txt.png')}}" alt="get-more">
                        </div>


                    </div>


                    <div class="training-plan-faqs-block">


                    </div>
                    <div class="clear"></div>
                </div>
            </div>
        </section>


        <section class="section__wrapper maxx-description">
            <div class="wrapper">
                <h2 class="section__title after-lines after-lines--large2 after-lines--white text-center">
                    DESCRIPTION
                </h2>

                <div class="flex flex-a--center flex--m-block maxx-description__wrapper">
                    <div class="block-75 m-block-100">

                        <div class="flex flex-j--between maxx-description__icons">
                            <div class="section__icon-wrapper">
                                <div class="section__icon-img section__icon-img--white flex flex-a--center flex-j--center">
                                    <img src="{{ asset('web/images/full-product/shedfat-maxx/weight-loss.svg')}}"
                                         alt="weight-loss">
                                </div>
                                <div class="text-center">
                                    <p class="section__icon-info section__icon-info--white">
                                        Weight Loss
                                    </p>
                                </div>
                            </div>

                            <div class="section__icon-wrapper">
                                <div class="section__icon-img section__icon-img--white flex flex-a--center flex-j--center">
                                    <img src="{{ asset('web/images/full-product/shedfat-maxx/boost-energy.svg')}}"
                                         alt="boost-energy">
                                </div>
                                <div class="text-center">
                                    <p class="section__icon-info section__icon-info--white">
                                        Boost Energy
                                    </p>
                                </div>
                            </div>


                            <div class="section__icon-wrapper">
                                <div class="section__icon-img section__icon-img--white flex flex-a--center flex-j--center">
                                    <img src="{{ asset('web/images/full-product/shedfat-maxx/optimize-health.svg')}}"
                                         alt="optimize-health">
                                </div>
                                <div class="text-center">
                                    <p class="section__icon-info section__icon-info--white">
                                        Optimize Health
                                    </p>
                                </div>
                            </div>


                            <div class="section__icon-wrapper">
                                <div class="section__icon-img section__icon-img--white flex flex-a--center flex-j--center">
                                    <img src="{{ asset('web/images/full-product/shedfat-maxx/reduced.svg')}}"
                                         alt="reduced">
                                </div>
                                <div class="text-center">
                                    <p class="section__icon-info section__icon-info--white">
                                        Reduced Bloating
                                    </p>
                                </div>
                            </div>

                        </div>


                        <p class="maxx-description__text">
                            Designed to burn fat while simultaneously providing all natural clean energy and focus.
                        </p>


                        <div class="flex flex--m-block flex-j--between maxx-description__blocks">
                            <div class="block-50 m-block-100 maxx-description__left-block">
                                <h2 class="maxx-description__title">Green Coffee Bean Extract (200 mg)</h2>
                                <p class="maxx-description__text">Supports fat burning, appetite control and boosts
                                    metabolism via Chlorogenic acid contained in green coffee beans.</p>

                                <h2 class="maxx-description__title">Caffeine Anhydrous (125 mg)</h2>
                                <p class="maxx-description__text">Increases the hormones epinephrine and norepinephrine,
                                    which aid in dissolving fat and increasing energy.</p>


                                <h2 class="maxx-description__title">Coleus Root Extract (50 mg)</h2>
                                <p class="maxx-description__text">Stimulates fat burning enzymes and hormones, which in
                                    turn causes weight loss.</p>

                            </div>
                            <div class="block-50 m-block-100 maxx-description__right-block">
                                <h2 class="maxx-description__title">L-Theanine (50 mg)</h2>
                                <p class="maxx-description__text">Puts your brain in alpha state, which allows you to be
                                    relaxed yet alert at the same time.</p>

                                <h2 class="maxx-description__title">Salvia Root Extract (25 mg)</h2>
                                <p class="maxx-description__text">Prevents blood vessel inflammation, lowers blood
                                    pressure, and increases blood flow circulation</p>


                                <h2 class="maxx-description__title">Yohimbe Bark Extract (20 mg)</h2>
                                <p class="maxx-description__text">Improves cognition, boost energy levels, and improve
                                    healing.</p>


                            </div>
                        </div>

                    </div>
                    <div class="block-35 m-block-100 text-right">
                        <img src="{{ asset('web/images/full-product/shedfat-maxx/bottle-description.png')}}"
                             class="bottle-description" alt="bottle-description">
                    </div>
                </div>


            </div>
        </section>


        <section class="grey-section section__wrapper maxx-directions">
            <div class="wrapper">
                <h2 class="section__title">Directions</h2>

                <div class="flex flex--m-block maxx-directions__wrapper">

                    <div class="maxx-directions__line"></div>

                    <div class="maxx-directions__item">
                        <div class="maxx-directions__item-num"><span>1</span></div>
                        <p class="maxx-directions__item-text">To assess your tolerance, take one capsule with 8 oz of
                            water once per day.</p>
                    </div>
                    <div class="maxx-directions__item">
                        <div class="maxx-directions__item-num"><span>2</span></div>
                        <p class="maxx-directions__item-text">Once your tolerance has been assessed, take one capsule
                            two times daily 30 to 60 minutes before your two largest meals of the day.</p>
                    </div>
                    <div class="maxx-directions__item">
                        <div class="maxx-directions__item-num"><span>3</span></div>
                        <p class="maxx-directions__item-text">Once tolerance has been assessed and you are looking for
                            additional boost of energy, take an additional capsule with the first serving of the day. Do
                            not exceed 3 capsules in a 24 hour period.</p>
                    </div>
                </div>

                <p class="info-text">*For the best results, use for 60 days in combination with diet and training.</p>

            </div>
        </section>

    </main>


    <add-to-cart-mobile
            product-slug="{{ $product->slug }}"
    >
    </add-to-cart-mobile>
@endsection
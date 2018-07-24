@extends('web.layouts.app')
@section('title')
    {!! $product->title !!} -@parent
@endsection
@section('style')
    @parent
    <link rel="stylesheet" href="{{asset('web/css/product_custom.css')}}">
@endsection
@section('content')
    <main>
        <div class="top-product-description-block">
            <div class="wrapper">
                <div class="product-preview-wrapper">
                    <div class="image-wrapper">
                        <img src="{!! $product->getFirstMediaUrl('products') !!}" />
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
                        @if($product->out_of_stock)
                            <div class="product-button-block">
                                <div class="add-to-cart-wrapper">
                                    <div class="product-button-block">
                                        <div class="add-to-cart-wrapper">
                                            <a class="add-to-cart-btn" href="javascript:void(0)" data-title="Shedfat Dad Hat">
                                                Register
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

    <section class="get-more">
        <div class="wrapper">
            <div class="flex flex-a--center flex--m-block">
                <div class="get-more__text">
                    <img src="{{ asset('web/images/full-product/text_images/3.svg')}}" alt="get-more">
                </div>
                <div class="get-more__img get-more__img--red-border">
                    <img src="{{ asset('web/images/full-product/hat-view.jpg')}}" alt="pr-get-more">
                </div>

            </div>
        </div>
    </section>
    </main>
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
    @if(!$product->out_of_stock)
        <add-to-cart-mobile
                product-slug="{{ $product->slug }}"
        >
        </add-to-cart-mobile>
    @endif
@endsection
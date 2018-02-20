@extends('web.layouts.app')
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
                                <h3 class="product-title">
                                    <a href="{{url('product/'.$product->slug)}}">
                                    {!! $product->title !!} </a>
                                </h3>
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

                            <add-to-card
                                    product-slug="{{ $product->slug }}"
                            >
                            </add-to-cart>
                        </div>
            @endforeach
        </div>
    </div>
        </div>
    </div>

    </main>
    <a href="#" class="btn add-to-cart-btn add-to-cart-btn--mobile">ADD TO CART</a>
@endsection

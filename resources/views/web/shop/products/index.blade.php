@extends('web.layouts.app')
@section('content')
    <main>
<div class="main">
        <div class="shop-grid-wrapper">
            <div class="wrapper">
                <div class="shop-items-wrapper">
            @foreach($product as $products)
                        <div class="shop-item">
                            <div class="image-wrapper">
                                <a href="#">
                                    <img src="{!! $products->getFirstMediaUrl('preview') !!}" />
                                </a>
                            </div>
                            <div class="product-details">
                                <h3 class="product-title">
                                    <a href="{{url('products/'.$products->slug)}}">
                                    {!! $products->title !!} </a>
                                </h3>
                                @if($products -> category)
                                    <p class="product-category-label"> {{ $products->category }} </p>
                                @endif

                            </div>
                            <div class="product-price-block">
                                <div class="product-price">
									<span class="product-amount">
                                        @if($products->old_amount)
                                        <del>
                                            ${{$products->old_amount}}
                                        </del>
                                        @endif
										<ins>
                                            ${{$products->amount}}
                                        </ins>
									</span>
                                </div>
                            </div>
                            <add-to-cart
                                    product-slug="{{ $products->slug }}"
                            >
                            </add-to-cart>
                        </div>
            @endforeach
        </div>
    </div>
        </div>
    </div>

    </main>
@endsection

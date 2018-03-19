@extends('web.layouts.app')
@section('content')
    <main class="checkout checkout-thank-you">
        <div class="main thank-you-page-template">
            <div class="checkout-top-navigation-bar-wrapper">
                <div class="wrapper">
                    <div class="checkout-top-navigation-bar">
                        <h2 class="checkout-title">
                            Thank you!
                        </h2>
                        <h4 class="checkout-sub-title">
                            Your order has been received.
                        </h4>
                    </div>
                </div>
            </div>
            <div class="tp-order-details-block-wrapper">
                <div class="wrapper">
                    <div class="tp-order-details-block">
                        <div class="cart-header-block">
                            <h2 class="cart-heading">
                                Order details
                            </h2>
                        </div>
                        <ul class="order_details">
                            <li class="order">
                                <h4>Order ID</h4>
                                <strong>{{ $order->id }}</strong>
                            </li>
                            <li class="date">
                                <h4>Date:</h4>
                                <strong>{{ $order->created_at->format('F j, Y') }}</strong>
                            </li>
                            <li class="method">
                                <h4>Payment Method:</h4>
                                <strong>{{ $order->payment_method_slug }}</strong>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="tp-customer-details-block-wrapper">
                <div class="wrapper">
                    <div class="tp-customer-details-block">
                        <div class="cart-header-block">
                            <h2 class="cart-heading">
                                Customer details
                            </h2>
                        </div>
                        <div class="tp-customer-details-info">
                            <div class="cd-contacts">
                                <dl class="customer_details">
                                    <h3>Contacts</h3>
                                    <dt>Name:</dt>
                                    <dd>{{ $order->billing->full_name }} </dd>
                                    <br>
                                    <dt>Email:</dt>
                                    <dd>{{ $order->billing->email }} </dd>
                                    <br>
                                    <dt>Telephone:</dt>
                                    <dd>{{ $order->billing->phone }}</dd>
                                </dl>
                            </div>
                            <div class="cd-billing-details">
                                <h3>Billing address</h3>
                                <address>
                                    <p>
                                        {{ $order->billing->apartment }}
                                        <br>
                                        {{ $order->billing->street }}
                                        <br>
                                        {{ $order->billing->city }}
                                        <br>
                                        {{ $order->billing->state }}
                                        <br>
                                        {{ $order->billing->postcode }}
                                        <br>
                                        {{ $order->billing->country }}
                                    </p>
                                </address>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="checkout-billing-details-block-wrapper">
                <div class="wrapper">
                    <div class="checkout-billing-details-block">
                        <form class="checkout-billing-details-form" action="" name="checkout-billing-details"
                              method="post">
                            <div class="billing-details-info-wrapper finish-order-step">
                                <div class="cart-review-block-wrapper finish-order-step">
                                    <div class="cart-review-block">
                                        <div class="cart-header-block">
                                            <h2 class="cart-heading">
                                                Product details
                                            </h2>
                                        </div>
                                        <table class="shop-table">
                                            <thead>
                                            <tr>
                                                <th class="product-name">
                                                    Product
                                                </th>
                                                <th class="product-quantity">
                                                    Quantity
                                                </th>
                                                <th class="product-subtotal">
                                                    Total
                                                </th>
                                            </tr>
                                            </thead>
                                            <tfoot>
                                            <tr class="cart-subtotal">
                                                <td></td>
                                                <th>
                                                    Subtotal:
                                                </th>
                                                <td>
                                                <span class="product-subtotal-amount">
                                                    ${{$order->product_cost}}
                                                </span>
                                                </td>
                                            </tr>
                                            @if($order->coupon_id)
                                                <tr class="cart-subtotal">
                                                    <td></td>
                                                    <th>
                                                        Coupon: {{ $order->coupon->code }}
                                                    </th>
                                                    <td>
                                                <span class="product-subtotal-amount">
                                                    -${{$order->discount_cost}}
                                                </span>
                                                    </td>
                                                </tr>
                                            @endif
                                            @if ($order->shipping_cost != '0.00')
                                                <tr class="shipping">
                                                    <td></td>
                                                    <th>
                                                        Shipping:
                                                    </th>
                                                    <td>
                                                <span class="product-subtotal-amount">
                                                    ${{ $order->shipping_cost }} via Flat Rate
                                                </span>
                                                    </td>
                                                </tr>
                                            @endif
                                            {{--<tr class="order-payment-method">
                                                <td></td>
                                                <th>
                                                    Payment method:
                                                </th>
                                                <td>
                                                    PayPal
                                                </td>
                                            </tr>--}}
                                            <tr class="order-total">
                                                <td></td>
                                                <th>
                                                    Total:
                                                </th>
                                                <td>
                                                 <span class="product-total-amount">
                                                     <strong>
                                                         ${{ $order->total_cost }}
                                                     </strong>
                                                 </span>
                                                </td>
                                            </tr>
                                            </tfoot>
                                            <tbody>
                                            @foreach($order->products as $product)
                                                <tr class="cart-row">
                                                    <td class="product-name">
                                                        <div class="product-thumbnail">
                                                            <a href="#">
                                                                <img src="{{ $product->getFirstMediaUrl('preview') }}"/>
                                                            </a>
                                                        </div>
                                                        <div class="product-info">
                                                            <a class="product-title" href="#">
                                                                {{ $product->title }}
                                                            </a>
                                                        </div>
                                                    </td>
                                                    <td class="product-quantity">
                                                        {{ $product->pivot->count }}
                                                    </td>
                                                    <td class="product-subtotal">
                                                    <span class="product-subtotal-amount">
                                                        $ {{$product->pivot->count * $product->amount}}
                                                    </span>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="buttons-area">
                                <a href="{{ route('shop') }}" class="continue-checkout">
                                    CONTINUE shopping
                                </a>
                            </div>
                            <div class="clear"></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection

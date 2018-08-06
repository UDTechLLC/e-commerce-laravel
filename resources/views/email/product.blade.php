@extends('email.layout')

@section('content')
    <main>
        <div class="main" style="margin: 20px; width: 100%;">
            <div class="wrapper">
                <img src="{{asset('web/images/logos/Shedfat-logo.png')}}" alt="logo">
                <div style="background-color: #ff1000;text-align: center; margin-right: 35px; ">
                    <h1 style="color: white; padding: 35px;">Thank you for your order</h1>
                </div>
                <div style="padding: 10px 50px;">
                    <h3>Your order has been received and is now being processed. Your order details are shown below for
                        your reference:</h3>
                    <h1 style="color: red;">Order #{{ $order->order_id }}</h1>
                    <table style="background-color: transparent;border-collapse: collapse;border-spacing: 0;margin: 0;max-width: 100%;
text-align: left;
  width: 100%;">
                        <thead>
                        <tr style="border-bottom: 1px solid #eaeaea;padding: 10px 0;">
                            <th class="product-name" style="padding: 20px 0;">
                                Product
                            </th>
                            <th class="product-quantity" style="padding: 20px 0;">
                                Quantity
                            </th>
                            <th class="product-price" style="padding: 20px 0;">
                                Price
                            </th>
                        </thead>
                        <tbody>
                        @foreach($order->products as $product)

                            <tr style="border-bottom: 1px solid #eaeaea;padding: 10px 0;">

                                <td style="padding: 20px 0;">
                                    {{$product->title}}
                                    @if($product->getMedia('download')->first() || $product->getMedia('products')->first()->getCustomProperty('external_link') != "")
                                        @if (!$product->parent_id)
                                            <br>
                                            @if ($product->getMedia('products')->first()->hasCustomProperty('external_link') && $product->getMedia('products')->first()->getCustomProperty('external_link') != null)
                                                <a href="{{ $product->generateProductLink($order) }}">
                                                    <u style="color:red">
                                                        @if($product->isVideolibrary())
                                                            Click here to download
                                                        @else
                                                        Fill out your questionnaire by clicking here
                                                        @endif
                                                    </u>
                                                </a>
                                                <br>
                                            @endif
                                            @if($product->getFirstMediaUrl('download'))
                                                <a href="{{ asset($product->getFirstMediaUrl('download')) }}">
                                                    <u style="color:red">Click here to download</u>
                                                </a>
                                            @endif
                                        @endif
                                @endif
                                </td>
                                <td class="product-quantity">
                                    {{ $product->pivot->count }}
                                </td>
                                <td class="product-subtotal">
                                                    <span class="product-subtotal-amount">
                                                        $ {{  $product->amount }}
                                                    </span>
                                </td>
                            </tr>

                        @endforeach
                        </tbody>
                        <tfoot>
                        <tr class="cart-subtotal">
                            <td colspan="2" style="padding: 20px 0;">

                                Subtotal:
                            </td>
                            <td>
                                                <span class="product-subtotal-amount">
                                                    ${{$order->product_cost}}
                                                </span>
                            </td>
                        </tr>
                        @if($order->coupon_id)
                            <tr class="cart-subtotal">
                                <td colspan="2">
                                    <span class="sub-total-label">
									Coupon: {{ $order->coupon->code }}:
								</span>
                                </td>
                                <td>
								<span class="sub-total-amount">
									-${{ $order->discount_cost }}
								</span>
                                </td>
                            </tr>
                        @endif
                        <tr class="order-payment-method">
                            <td colspan="2">
                                Payment method:
                            </td>
                            <td>
                                {{ $order->payment_method_slug }}
                            </td>
                        </tr>
                        @if($order->shipping_cost)
                            <tr class="shipping">
                                <td colspan="2">
                                    Shipping:
                                </td>
                                <td>
                                    <span class="product-subtotal-amount">
                                        ${{ $order->shipping_cost }}
                                    </span>
                                </td>
                            </tr>
                        @endif
                        <tr class="order-total">
                            <td colspan="2">
                                Total:
                            </td>
                            <td>
                                                 <span class="product-total-amount">
                                                     <strong>
                                                         ${{ $order->total_cost }}
                                                     </strong>
                                                 </span>
                            </td>
                        </tr>
                        @if($order->hasSubscriptionProduct())
                            <tr class="recurring-totals">
                                <th colspan="2">Recurring Totals</th>
                            </tr>
                            <tr class="cart-subtotal recurring-total">
                                <th colspan="2">Subtotal</th>
                                <td data-title="Subtotal">
                                    <span>&#036;</span><span>{{ $order->getSubscriptionProduct()->amount }}</span></td>
                            </tr>

                            <tr class="shipping recurring-total 2018_06_15_monthly">
                                <th colspan="2">Shipping via Flat Rate</th>
                                <td data-title="Shipping via Flat Rate">
                                    <span>&#036;</span><span>{{ $order->shipping_cost }} </span>																											</td>
                            </tr>

                            <tr class="order-total recurring-total">
                                <th colspan="2">Recurring Total</th>
                                <td data-title="Recurring Total">
                                    <strong>
                                        <span>&#036;</span><span>{{ $order->getSubscriptionProduct()->amount + $order->shipping_cost}}
                                                            </span>
                                    </strong>
                                </td>
                            </tr>
                        @endif


                        </tfoot>
                    </table>
                    <h1 style="color: red;">Customer details</h1>
                    <ul style="list-style: outside;box-sizing: border-box; padding-left: 30px;">
                        <li><strong>Email: </strong> <u style="color:blue">{{ $order->billing->email }}</u></li>
                        <li><strong> Phone: </strong><u style="color:blue">{{ $order->billing->phone }}</u></li>
                    </ul>
                </div>
            </div>
        </div>
    </main>
@stop

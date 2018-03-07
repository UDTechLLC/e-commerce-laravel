@extends('email.layout')

@section('content')
    <main>
        <div class="main" style="margin: 20px; width: 100%;">
            <div class="wrapper">
    <img src="{{asset('web/images/logos/Shedfat-logo.png')}}" alt="logo">
                <div style="background-color: #ff1000;text-align: center;" >
                    <h1 style="color: white; padding: 40px;">Thank you for your order</h1>
                </div>
                <div style="padding: 10px 50px;">
                <h3>Your order has been received and is now being processed. Your order details are shown below for your reference:</h3>
                <h1 style="color: red;">Order #{{ $order->id }}</h1>
                        <table class="shop-table">
                        <thead>
                        <tr>
                            <th class="product-name">
                                Product
                            </th>
                            <th class="product-quantity">
                                Quantity
                            </th>
                            <th class="product-price">
                                Price
                            </th>
                        </thead>
                        <tbody>
                        @foreach($order->products as $product)

                        <tr>
                            <td>
                                {{$product->title}}
                                @if ($product->isVirtual())
                                <br>
                                <a href="{{ $product->product_link }}">
                                    @if (strpos($product->title, 'Week'))
                                        <u style="color:red">Click here to fill out your questionnaire</u>
                                    @else
                                        <u style="color:red">Click here to download</u>
                                    @endif
                                </a>
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
                            <td colspan="2">

                                Subtotal:
                            </td>
                            <td>
                                                <span class="product-subtotal-amount">
                                                    ${{$order->product_cost}}
                                                </span>
                            </td>
                        </tr>
                        <tr class="order-payment-method">
                            <td colspan="2">
                            Payment method:
                            </td>
                            <td>
                                PayPal
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


                        </tfoot>
                    </table>
                    <h1 style="color: red;">Customer details</h1>
                    <ul style="list-style: outside;box-sizing: border-box; padding-left: 30px;">
                        <li> <strong>Email: </strong> <u style="color:blue">{{ $order->billing->email }}</u></li>
                        <li><strong> Phone: </strong><u style="color:blue">{{ $order->billing->phone }}</u></li>
                    </ul>
            </div>
            </div>
        </div>
    </main>
@stop
@extends('admin.layouts.app')

@section('content')


       <div class="wrapper">
           <h1>Order #{{$order->id}}</h1>
<div class="row">
    <div class="col-lg-3">
        <h3>General Details</h3>
        <p style="font-weight: bold;">Order date: </p>
        <p>{{$order->created_at->format('M j, Y') }}</p>
        <fofm>
            <label>Order status:</label>
{{--{{ dump($stat) }}--}}
            <select>
                @foreach($stat as $state)
                    {{--{{ $state }}--}}
                <option value="{{$state}}">{{$state}}</option>
                @endforeach
            </select>

        </fofm>
    </div>
    <div class="col-lg-3">
        <h3>Billing details</h3>
        <p style="text-transform: capitalize">Name: {{ $order->billing->first_name}} {{$order->billing->last_name}}</p>
        <p style="font-weight: bold;">Address: </p>
        <p> {{$order->billing->company_name}}  {{ $order-> billing->street }} str, {{$order->billing->apartment}} <br>
            {{ $order->billing->country }}, {{ $order->billing->city }} <br>
            {{$order->billing->state}}, {{$order->billing->postcode}}</p>
        <p style="font-weight: bold;">Email address: </p>
        <p>{{ $order->billing->email }}</p>
        <p style="font-weight: bold;"> Phone: </p>
        <p>{{ $order->billing->phone }}</p>
    </div>
    <div class="col-lg-3">
        <h3>Shipping details</h3>
        <p style="text-transform: capitalize">Name: {{ $order->shipping->first_name}} {{$order->shipping->last_name}}</p>
        <p>Address: </p>
        <p> {{$order->shipping->company_name}}  {{ $order-> shipping->street }} str, {{$order->shipping->apartment}} <br>
            {{ $order->shipping->country }}, {{ $order->shipping->city }} <br>
            {{$order->shipping->state}}, {{$order->shipping->postcode}}</p>
    </div>
</div>
       </div>


    <div class="main">
        <div class="cart-block-wrapper">
            <div class="wrapper">
                <form class="cart-form" action="" method="post">
                    <div class="cart-block">
                        <div class="cart-header-block">
                            <h3 class="cart-heading">
                                You Have {{$order->count}} Items In Your Cart
                            </h3>
                        </div>
    <div class="cart-wrapper">
        </div>
        <table class="shop-table">
            <thead>
            <tr>
                <th class="product-name">
                    Product
                </th>
                {{--<th class="product-price">--}}
                    {{--Price--}}
                {{--</th>--}}
                {{--<th class="product-quantity">--}}
                    {{--Quantity--}}
                {{--</th>--}}
                {{--<th class="product-subtotal">--}}
                    {{--Total--}}
                {{--</th>--}}
                <th class="product-price">
                    Price
                </th>

            </tr>
            </thead>
            <tbody>
            @foreach($order->products as $product)
            <tr class="cart-row">
                <td class="product-name">

                    <div class="product-thumbnail">
                        <a href="#">
                            <img src="{!! $product->getFirstMediaUrl('products') !!}" />
                        </a>
                    </div>
                    <div class="product-info">
                        <a class="product-title" href="#">
                            {{$product->title}}
                        </a>
                    </div>
                </td>
                <td class="product-price">
                    <span class="product-amount">
                       ${{$product->amount}}
                    </span>
                </td>
                {{--<td class="product-quantity">--}}
                    {{----}}
                    {{--<div class="quantity buttons_added">--}}
                        {{--<input id="" class="input-text qty text" step="1" min="0" max="" name="" value="1" title="Qty" size="4" pattern="[0-9]*" inputmode="numeric" type="number" />--}}
                    {{--</div>--}}
                {{--</td>--}}
                {{--<td class="product-subtotal">--}}
                                                {{--<span class="product-subtotal-amount">--}}
                                                    {{--$50.00--}}
                                                {{--</span>--}}
                {{--</td>--}}

            </tr>
            @endforeach
            </tbody>
            <tbody>
            <tr>
                <td>
                    Total:
                </td>
                <td>
                    {{$order->total_cost}}
                </td>
            </tr>
            </tbody>
        </table>
    </div>
   </form>
  </div>
    </div>
    </div>


    @endsection
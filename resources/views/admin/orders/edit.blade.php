@extends('admin.layouts.app')

@section('content')

<main>
    <form action="{{route('admin.orders.update', $order->id )}}" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}
        {{ method_field('PATCH') }}
    {{--{!! Form::model($order, ['action'=>['OrderController@update','id'=>$order->id],'files'=>true, 'method'=>'put']) !!}--}}
       <div class="wrapper">
           <h1>Order #{{$order->id}}</h1>
<div class="row">
    <div class="col-lg-3">
        <h3>General Details</h3>
        <p style="font-weight: bold;">Order date: </p>
        <p>{{$order->created_at->format('M j, Y') }}</p>
        <p style="font-weight: bold;">Update date: </p>
        <p>{{$order->updated_at->format('M j, Y') }}</p>
           <div class="form-group">
            <label for="state">Order status:</label>
            <select name="state" id="state">
                @foreach($state as $sta)
                    {{--{{ $state }}--}}
                <option value="{{ $sta }}" {{( $sta==$order->state ) ? 'selected' : '' }}>{{ $sta }}</option>
                @endforeach
            </select></div>
        <div class="form-group">
            <div class="col-md-3 col-sm-3 col-xs-12 col-md-offset-3">
                <button type="submit" class="btn btn-primary">Submit
                </button>
            </div>
        </div>
      </div>

    <div class="col-lg-3">
        <h3>Billing details</h3>
        <p style="text-transform: capitalize">Name: {{ $order->billing->first_name}} {{$order->billing->last_name}}</p>
        @if($order->isShipping())
        <p style="font-weight: bold;">Address: </p>
        <p> {{$order->billing->company_name}}  {{ $order-> billing->street }} str, {{$order->billing->apartment}} <br>
            {{ $order->billing->country }}, {{ $order->billing->city }} <br>
            {{$order->billing->state}}, {{$order->billing->postcode}}</p>
        @endif
        <p style="font-weight: bold;">Email address: </p>
        <p>{{ $order->billing->email }}</p>
        <p style="font-weight: bold;"> Phone: </p>
        <p>{{ $order->billing->phone }}</p>
    </div>

    <div class="col-lg-3">
        @if($order->isShipping())
        <h3>Shipping details</h3>
        @if($order->shipping_id)
        <p style="text-transform: capitalize">Name: {{ $order->shipping->first_name}} {{$order->shipping->last_name}}</p>
            {{--@if($order->getShipping())--}}
        <p>Address: </p>
        <p> {{$order->shipping->company_name}}  {{ $order-> shipping->street }} str, {{$order->shipping->apartment}} <br>
            {{ $order->shipping->country }}, {{ $order->shipping->city }} <br>
            {{$order->shipping->state}}, {{$order->shipping->postcode}}</p>
                {{--@endif--}}
            @else
            <p style="text-transform: capitalize">Name: {{ $order->billing->first_name}} {{$order->billing->last_name}}</p>
                   {{--@if($order->getShipping())--}}
            <p style="font-weight: bold;">Address: </p>
            <p> {{$order->billing->company_name}}  {{ $order-> billing->street }} str, {{$order->billing->apartment}} <br>
                {{ $order->billing->country }}, {{ $order->billing->city }} <br>
                {{$order->billing->state}}, {{$order->billing->postcode}}</p>
                   {{--@endif--}}
            @endif
        @endif
    </div>

</div>
<br>
       <div class="checkout-billing-details-block-wrapper">
           <div class="wrapper">
               <div class="checkout-billing-details-block">
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
                                       <tr class="cart-subtotal" >
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
                                       <tr class="order-payment-method">
                                           <td></td>
                                           <th>
                                               Payment method:
                                           </th>
                                           <td>
                                               PayPal
                                           </td>
                                       </tr>
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
                                                           <br> SKU {{ $product->id }}
                                                       </a>
                                                   </div>
                                               </td>
                                               <td class="product-quantity">
                                                   {{ $product->pivot->count }}
                                               </td>
                                               <td class="product-subtotal">
                                                    <span class="product-subtotal-amount">
                                                        $ {{ $product->pivot->count * $product->amount }}
                                                    </span>
                                               </td>
                                           </tr>
                                       @endforeach
                                       </tbody>
                                   </table>
                               </div>
                           </div>
                       </div>
               </div>
           </div>
       </div>
       </div>
    </form>
</main>



    @endsection

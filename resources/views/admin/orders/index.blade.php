@extends('admin.layouts.app')

@section('content')
   <div class="container">
      <h2>Orders</h2>
      <table class="table table-bordered">
         <thead>
         <tr>
            <th>Order</th>
            <th>User_id</th>
            <th>Shipping_id</th>
            <th>Billing_id</th>
            <th>Date</th>
            <th>Product_cost</th>
            <th>Shipping_cost</th>
            <th>Total_cost</th>
            <th>Count</th>
            <th>Status</th>
         </tr>
         </thead>
         <tbody>
         @foreach($orders as $order)
         <tr>
            {{--{{$order->coupon->code}}--}}
            <td><a href="{{url('admin/orders/'.$order->id)}}"> #{{ $order->id }}</a></td>

            @if($order->user_id)
            <td>{{ $order->user->first_name }} , {{ $order->user->email }} </td>
               @else
            {{--<td>Unregister user</td>--}}
               <td>{{ $order->billing->first_name}} {{ $order->billing->last_name}}, <br> {{$order->billing->email}}</td>

            @endif

            @if($order->shipping_id)
               <td style="text-transform: capitalize">{{ $order->shipping->first_name}} {{ $order->shipping->last_name}}
                  @if($order->isShipping()),
                  {{$order->shipping->company_name}}, {{ $order-> shipping->street }} str,
                  {{ $order->shipping->country }}, {{ $order->shipping->city }} ,
                  {{$order->shipping->state}}, {{$order->shipping->postcode}}</td>
                  @endif
            @else
               <td style="text-transform: capitalize">{{ $order->billing->first_name}} {{ $order->billing->last_name}}
                  @if($order->isShipping()),
                  {{$order->billing->company_name}}, {{ $order-> billing->street }} str,
                  {{ $order->billing->country }}, {{ $order->billing->city }} ,
                  {{$order->billing->state}}, {{$order->billing->postcode}}</td>
                   @endif
            @endif

            <td style="text-transform: capitalize">{{ $order->billing->first_name}} {{ $order->billing->last_name}}
               {{--@if($order->isShipping)--}}
               @if($order->isShipping()),
               {{$order->billing->company_name}}, {{ $order-> billing->street }} str,
               {{ $order->billing->country }}, {{ $order->billing->city }} ,
               {{$order->billing->state}}, {{$order->billing->postcode}}
            @endif
            </td>

            <td>{{ $order->created_at->format('M j, Y') }}</td>
            <td>{{ $order->product_cost }}</td>
            <td>{{ $order->shipping_cost }}</td>
            <td>{{ $order->total_cost }}</td>
            <td>{{ $order->count }}</td>
            <td>{{ $order->state }}</td>
{{--<td><select>--}}
      {{--@foreach(\App\Models\Order::ORDER_STATES as order)--}}
      {{--<option value="{{ $order }}"></option>--}}
         {{--@endforeach--}}
   {{--</select></td>--}}
            {{--{{dump($orders->state )}}--}}
            </tr>
         @endforeach
         </tbody>
      </table>
      {{ $orders->links() }}
   </div>

@endsection

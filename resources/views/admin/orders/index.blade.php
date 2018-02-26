@extends('admin.layouts.app')

@section('content')
   <div class="container">
      <h2>Order Table</h2>
      <p>The orders to a table:</p>
      <table class="table table-bordered">
         <thead>
         <tr>
            <th>id</th>
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
         <tr>
            <td>Test</td>
            <td>test</td>
            <td>Test</td>
            <td>Test</td>
            <td>Test</td>
            <td>Test</td>
            <td>Test</td>
            <td>Test</td>
            <td>Test</td>
            <td>Test</td>
         </tr>
         @foreach($order as $orders)
         <tr>
            <td>{{ $orders->id }}</td>

            @if($orders->user_id)
            <td>{{ $orders->user->first_name }} , {{ $orders->user->email }} </td>
               @else
            {{--<td>Unregister user</td>--}}
               <td>{{ $orders->billing->first_name}} {{ $orders->billing->last_name}}, <br> {{$orders->billing->email}}</td>

            @endif

            @if($orders->shipping_id)
               <td style="text-transform: capitalize">{{ $orders->shipping->first_name}} {{ $orders->shipping->last_name}},
                  {{$orders->shipping->company_name}}, {{ $orders-> shipping->street }} str, {{$orders->shipping->apartment}},
                  {{ $orders->shipping->country }}, {{ $orders->shipping->city }} ,
                  {{$orders->shipping->state}}, {{$orders->shipping->postcode}}</td>
            @else
             <td> - </td>
            @endif

            <td style="text-transform: capitalize">{{ $orders->billing->first_name}} {{ $orders->billing->last_name}},
               {{$orders->billing->company_name}}, {{ $orders-> billing->street }} str, {{$orders->billing->apartment}},
               {{ $orders->billing->country }}, {{ $orders->billing->city }} ,
               {{$orders->billing->state}}, {{$orders->billing->postcode}}</td>

            <td>{{ $orders->created_at->format('M j, Y') }}</td>
            <td>{{ $orders->product_cost }}</td>
            <td>{{ $orders->shipping_cost }}</td>
            <td>{{ $orders->total_cost }}</td>
            <td>{{ $orders->count }}</td>
            <td>{{ $orders->state }}</td>

            </tr>
         @endforeach
         </tbody>
      </table>
   </div>

@endsection
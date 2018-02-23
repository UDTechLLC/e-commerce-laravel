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
         </tr>
         <tr>
         @foreach($order as $orders)
            <td>{{ $orders->id }}</td>
            <td>{{ $orders->user_id}}</td>
            <td>{{ $orders->shipping_id}}</td>
            <td>{{ $orders->billing_id}}</td>
            <td>{{ $orders->product_cost }}</td>
            <td>{{ $orders->total_cost }}</td>
            <td>{{ $orders->count }}</td>
            <td>{{ $orders->state }}</td>
            @endforeach
            </tr>
         </tbody>
      </table>
   </div>

   </body>
   </html>

@endsection
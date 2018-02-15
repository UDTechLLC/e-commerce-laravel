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
            <th>Product_id</th>
            <th>Amount</th>
            <th>Count</th>
            <th>State</th>
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
         </tr>
         <tr>
         @foreach($order as $orders)
            <td>{{ $orders->id }}</td>
            <td>{{ $orders->user->name}}</td>
            <td>{{ $orders->products_id }}</td>
            <td>{{ $orders->amount }}</td>
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
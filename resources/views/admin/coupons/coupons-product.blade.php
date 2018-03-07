@extends('admin.layouts.app')
@section('content')
    <h2>Attach product</h2>
    <!-- Start to do list -->
    <div class="row">
        <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Product list</h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <form action="{{ route('admin.coupons.attach', $coupon->id) }}" method="post">
                        {{ csrf_field() }}
                        <div class="">
                            <ul class="to_do">
                                @foreach($products as $product)
                                    <li>
                                        <label for="{{ $product->title }}">
                                            <input id="{{ $product->title }}" name="products[]"
                                                   value="{{ $product->id }}"
                                                   type="checkbox"
                                                   @if(in_array($product->id, $productIds)) checked @endif
                                            > {{ $product->title }}
                                        </label>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="actionBar">
                            <input type="submit" value="Attach" class="btn btn-success">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- End to do list -->
@endsection
@extends('admin.layouts.app')
@section('content')
    <h2>Product create</h2>
    <products-create view-list="{{ json_encode(\App\Models\Product::VIEW_NAMES) }}"></products-create>
@endsection
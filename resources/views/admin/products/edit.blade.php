@extends('admin.layouts.app')

@section('content')
    <products-edit product="{{ json_encode($product) }}" view-list="{{ json_encode(\App\Models\Product::VIEW_NAMES) }}"></products-edit>
@endsection
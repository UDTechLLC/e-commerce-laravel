@extends('admin.layouts.app')
@section('content')
    <products-order products-props="{{ json_encode($products) }}"></products-order>
@endsection
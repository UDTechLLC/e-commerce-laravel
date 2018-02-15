@extends('admin.layouts.app')

@section('content')
    <products-edit product="{{ json_encode($product) }}"></products-edit>
@endsection
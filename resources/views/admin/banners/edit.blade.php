@extends('admin.layouts.app')
@section('content')
    <h2>Banner edit</h2>
    <banner-edit :banner-props="{{$banner}}"></banner-edit>
@endsection

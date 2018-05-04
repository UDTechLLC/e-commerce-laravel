@extends('admin.layouts.app')
@section('content')
    <h2>Category edit</h2>
    <category-edit :category="{{$category}}"></category-edit>
@endsection

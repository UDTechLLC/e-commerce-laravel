@extends('admin.layouts.app')
@section('content')
    <h1>Create Post</h1>
    <blog-edit
            :categories="{{$categories}}"
            :post-props="{{$post}}"
    ></blog-edit>
@endsection


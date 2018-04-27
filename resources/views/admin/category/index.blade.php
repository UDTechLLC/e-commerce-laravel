@extends('admin.layouts.app')

@section('content')
    <h1>Categories</h1>
    @foreach($categories as $category)
        {{ $loop->index + 1 }}. {{ $category->title }}
    @endforeach
@stop

@extends('admin.layouts.app')
@section('content')
    <h1>Create Post</h1>
    <blog-create :categories="{{$categories}}"></blog-create>
@endsection


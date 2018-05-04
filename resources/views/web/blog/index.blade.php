@extends('web.layouts.app')
@section('style')
    @parent
    <link rel="stylesheet" href="{{asset('web/css/blog.css')}}">
@endsection
@section('content')
    <main class="blog">
        <div class="blog__heading-wrapper">
            <div class="blog__heading">
                <h1 class="blog__heading-title">
                    Blog
                </h1>
            </div>
        </div>
        <blog :categories="{{$categories}}"></blog>
    </main>
@endsection

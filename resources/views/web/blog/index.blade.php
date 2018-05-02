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
        {{--<div class="blog__navigation-wrapper">--}}
            {{--<nav class="blog__navigation">--}}
                {{--<ul>--}}

                    {{--<li>--}}
                        {{--<a class="tab-link" href="#">Exercises</a>--}}
                    {{--</li>--}}
                    {{--<li class="active">--}}
                        {{--<a class="tab-link" href="#">Blog</a>--}}
                    {{--</li>--}}
                    {{--<li>--}}
                        {{--<a class="tab-link" href="#">Vlog</a>--}}
                    {{--</li>--}}
                    {{--<li>--}}
                        {{--<a class="tab-link" href="#">Workouts</a>--}}
                    {{--</li>--}}
                    {{--<li>--}}
                        {{--<a class="tab-link" href="#">Recipes</a>--}}
                    {{--</li>--}}
                    {{--<li>--}}
                        {{--<a class="tab-link" href="#">Education</a>--}}
                    {{--</li>--}}
                {{--</ul>--}}
            {{--</nav>--}}
        {{--</div>--}}
        <blog></blog>
    </main>
@endsection

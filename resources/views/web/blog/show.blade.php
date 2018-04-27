@extends('web.layouts.app')
@section('style')
    @parent
    <link rel="stylesheet" href="{{asset('web/css/blog.css')}}">
    <link rel="stylesheet" href="{{asset('web/css/blog_post.css')}}">
    @endsection
@section('content')
    <main class="blog-post">
        <article class="blog-post__content">
            <h1 class="blog-post__content-title">
                {{ $post->title }}
            </h1>
            <div class="blog-post__content-image-wrapper">
                <img src="{{asset($post->getFirstMediaUrl('banner'))}}">
            </div>
            {!! $post->content !!}
            <div class="blog-post__content-copyrights">
                <p>
                    By: Vic M.
                </p>
                <p>
                    B.S. Exercise Science, NSCA-CSCS Certified
                </p>
            </div>
        </article>
        <div class="blog-post__sidebar">
            <h1 class="blog-post__sidebar-title">
                Top 4 Posts
            </h1>
            <aside class="blog__post">
                <a class="blog__post-top" href="#">
                    <img src="/web/images/blog/4.png" />
                </a>
                <div class="blog__post-bottom">
                    <h2 class="blog__post-bottom-title">
                        <a href="#">
                            HOW Do You Get Rid of Cellulite?
                        </a>
                    </h2>
                    <div class="blog__post-bottom-info">
                        <div class="blog__post-bottom-meta-view">
                            <img class="blog__post-icon" src="/web/images/blog/icon-white.svg" />
                                <span class="blog__post-text">
                                    5,388
                                </span>
                        </div>
                        <span class="blog__post-separator">|</span>
                        <div class="blog__post-bottom-meta-likes">
                            <img class="blog__post-icon" src="/web/images/blog/icon-heart-white.svg" />
                                <span class="blog__post-text">
                                    23+
                                </span>
                        </div>
                    </div>
                </div>
            </aside>
            <aside class="blog__post">
                <a class="blog__post-top" href="#">
                    <img src="/web/images/blog/3.png" />
                </a>
                <div class="blog__post-bottom">
                    <h2 class="blog__post-bottom-title">
                        <a href="#">
                            Results! Never Leave Home To Find Them!
                        </a>
                    </h2>
                    <div class="blog__post-bottom-info">
                        <div class="blog__post-bottom-meta-view">
                            <img class="blog__post-icon" src="/web/images/blog/icon-white.svg" />
                                <span class="blog__post-text">
                                    371
                                </span>
                        </div>
                        <span class="blog__post-separator">|</span>
                        <div class="blog__post-bottom-meta-likes">
                            <img class="blog__post-icon" src="/web/images/blog/icon-heart-white.svg" />
                                <span class="blog__post-text">
                                    3+
                                </span>
                        </div>
                    </div>
                </div>
            </aside>
            <aside class="blog__post">
                <a class="blog__post-top" href="#">
                    <img src="/web/images/blog/2.png" />
                </a>
                <div class="blog__post-bottom">
                    <h2 class="blog__post-bottom-title">
                        <a href="#">
                            Risk vs. Reward-The Extra Burn
                        </a>
                    </h2>
                    <div class="blog__post-bottom-info">
                        <div class="blog__post-bottom-meta-view">
                            <img class="blog__post-icon" src="/web/images/blog/icon-white.svg" />
                                <span class="blog__post-text">
                                    725
                                </span>
                        </div>
                        <span class="blog__post-separator">|</span>
                        <div class="blog__post-bottom-meta-likes">
                            <img class="blog__post-icon" src="/web/images/blog/icon-heart-white.svg" />
                                <span class="blog__post-text">
                                    2+
                                </span>
                        </div>
                    </div>
                </div>
            </aside>
            <aside class="blog__post">
                <a class="blog__post-top" href="#">
                    <img src="/web/images/blog/1.jpg" />
                </a>
                <div class="blog__post-bottom">
                    <h2 class="blog__post-bottom-title">
                        <a href="#">
                            The Best and The Worst Cardio For Building a Booty
                        </a>
                    </h2>
                    <div class="blog__post-bottom-info">
                        <div class="blog__post-bottom-meta-view">
                            <img class="blog__post-icon" src="/web/images/blog/icon-white.svg" />
                                <span class="blog__post-text">
                                    9,028
                                </span>
                        </div>
                        <span class="blog__post-separator">|</span>
                        <div class="blog__post-bottom-meta-likes">
                            <img class="blog__post-icon" src="/web/images/blog/icon-heart-white.svg" />
                                <span class="blog__post-text">
                                    0
                                </span>
                        </div>
                    </div>
                </div>
            </aside>
        </div>
    </main>
@endsection
@extends('web.layouts.app')
@section('title')
    {{ $post->meta_title }}
@endsection
@section('meta')
    <meta name="description" content="{{ $post->meta_description }}">
    <meta name="keywords" content="{{ $post->meta_keywords }}">
@endsection
@section('style')
    @parent
    <link rel="stylesheet" href="{{asset('web/css/blog.css')}}">
    <link rel="stylesheet" href="{{asset('web/css/blog_post.css')}}">
@endsection
@section('body-script')
    @parent
    <script>
        window.fbAsyncInit = function () {
            FB.init({
                appId: '1910714849219795',
                autoLogAppEvents: true,
                xfbml: true,
                version: 'v2.10'
            });
            FB.AppEvents.logPageView();
        };
    </script>
@endsection
@section('content')
    <main class="blog-post">
        <article class="blog-post__content">
            <h1 class="blog-post__content-title">
                {{ $post->title }}
            </h1>
            <div class="blog-post__content-image-wrapper">
                <img src="{{asset($post->image)}}">
            </div>
            {!! $post->content !!}
            <div class="blog-post__content-social">
                <div class="blog-post__content-viewlike">
                    <div class="blog-post__content-view">
                        <img src="{{asset('web/images/blog/view-desk-icon.svg')}}"/>
                            <span class="blog-post__content-view-counter">
                                {{ $post->view_count }}
                            </span>
                    </div>
                    <like-button
                            type="blog"
                            :likes="{{ $post->likes_count }}"
                            like-url="{{ route('likes.like', $post->slug) }}"
                            dislike-url="{{ route('likes.dislike', $post->slug) }}"
                            :id="{{$post->getKey()}}"
                    ></like-button>
                </div>
                <div class="blog-post__content-share">
                        <span id="shareButton" class="share-btn">
                            <i class="fas fa-share-alt"></i>
                        </span>
                    <ul class="blog-post__content-share-list" style="">
                        <li class="blog-post__content-share-item">
                            <a class="facebook-share blog-post__content-share-item-link"
                               onclick="facebookShare(event);">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                        </li>
                        <li class="blog-post__content-share-item">
                            <a class="twitter-share blog-post__content-share-item-link">
                                <i class="fab fa-twitter"></i>
                            </a>
                        </li>
                        <li class="blog-post__content-share-item">
                            <a class="pinterest-share blog-post__content-share-item-link"
                               target="_blank" href="http://pinterest.com/pin/create/button/?url={{ Request::url() }}&media={{asset($post->previewImage)}}&description={{ $post->title }}">
                                <i class="fab fa-pinterest-p"></i>
                            </a>
                        </li>
                        <li class="blog-post__content-share-item">
                            <a class="email-share blog-post__content-share-item-link"
                               href="mailto:?subject={{$post->title}}&amp;body={{ Request::url() }}"
                               title="Share by Email">
                                <i class="far fa-envelope"></i>
                            </a>
                        </li>
                        {{--<li>
                            <a target="_blank" href="http://pinterest.com/pin/create/button/?url={{ Request::url() }}&media={{asset($post->previewImage)}}&description={{ $post->title }}" class="pin-it-button" count-layout="horizontal">
                                <img border="0" src="//assets.pinterest.com/images/PinExt.png" title="Pin It" />
                            </a>
                        </li>--}}
                       {{-- <li>
                            <a data-pin-do="buttonBookmark" data-pin-lang="en" href="https://www.pinterest.com/pin/create/button/"></a>
                        </li>--}}
                    </ul>
                </div>
            </div>
            <div class="fb-comments" data-href="{{ Request::url() }}" data-width="100%" data-numposts="5"></div>
        </article>
        <div class="blog-post__sidebar">
            <h1 class="blog-post__sidebar-title">
                Top 4 Posts
            </h1>
            @foreach($topPosts as $item)
                <aside class="blog__post">
                    <a class="blog__post-top" href="{{ route('blog.show', $item->slug) }}">
                        <img src="{{ $item->previewImage }}"/>
                    </a>
                    <div class="blog__post-bottom">
                        <h2 class="blog__post-bottom-title">
                            <a href="{{ route('blog.show', $item->slug) }}">
                                HOW Do You Get Rid of Cellulite?
                            </a>
                        </h2>
                        <div class="blog__post-bottom-info">
                            <div class="blog__post-bottom-meta-view">
                                <img class="blog__post-icon" src="{{ asset('/web/images/blog/icon-white.svg') }}"/>
                                <span class="blog__post-text">
                                    {{ $item->view_count }}
                                </span>
                            </div>
                            <span class="blog__post-separator">|</span>
                            <div class="blog__post-bottom-meta-likes">
                                <img class="blog__post-icon"
                                     src="{{ asset('/web/images/blog/icon-heart-white.svg') }}"/>
                                <span class="blog__post-text">
                                    {{ $item->likes_count }}+
                                </span>
                            </div>
                        </div>
                    </div>
                </aside>
            @endforeach
        </div>
    </main>
@endsection
@section('scripts')
    @parent
  {{--  <script async defer src="//assets.pinterest.com/js/pinit.js"></script>--}}
    <script>

        $(function () {
            /*
             * Twitter
             * */
            var twitterPath = 'https://twitter.com/share?';
            // var url = 'https%3A%2F%2Fdev.twitter.com%2Fweb%2Ftweet-button';
            var url = window.location.href;
            var text = '{{$post->title}}';
            $('.twitter-share').attr('href', `${twitterPath}url=${url}&text=${text}`);
        });
        /*
         * facebook
         * */
        function facebookShare(e) {
            e.preventDefault();
            FB.ui({
                method: 'share',
                href: window.location.href,
            }, function (response) {
            });
        }
    </script>
@endsection
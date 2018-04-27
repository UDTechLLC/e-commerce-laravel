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
        <nav class="blog__navigation">
            <ul>
                <li>
                    <a class="tab-link" href="#">Exercises</a>
                </li>
                <li class="active">
                    <a class="tab-link" href="#">Blog</a>
                </li>
                <li>
                    <a class="tab-link" href="#">Vlog</a>
                </li>
                <li>
                    <a class="tab-link" href="#">Workouts</a>
                </li>
                <li>
                    <a class="tab-link" href="#">Recipes</a>
                </li>
                <li>
                    <a class="tab-link" href="#">Education</a>
                </li>
            </ul>
        </nav>
        <div class="blog__posts">
            <article class="blog__post">
                <a class="blog__post-top" href="#">
                    <img src="assets/images/blog/1.jpg" />
                </a>
                <div class="blog__post-bottom">
                    <h2 class="blog__post-bottom-title">
                        <a href="#">
                            The Best and The Worst Cardio For Building a Booty
                        </a>
                    </h2>
                    <div class="blog__post-bottom-info">
                        <img class="blog__post-icon" src="assets/images/blog/blog-icon.svg" />
                        <span class="blog__post-separator">|</span>
                        <p class="blog__post-bottom-meta-line">
                            November 27th, 2017
                        </p>
                        <span class="blog__post-separator">|</span>
                        <div class="blog__post-bottom-meta-view">
                            <img class="blog__post-icon" src="assets/images/blog/icon-white.svg" />
                                <span class="blog__post-text">
                                    9,028
                                </span>
                        </div>
                        <span class="blog__post-separator">|</span>
                        <div class="blog__post-bottom-meta-likes">
                            <img class="blog__post-icon" src="assets/images/blog/icon-heart-white.svg" />
                                <span class="blog__post-text">
                                    0
                                </span>
                        </div>
                    </div>
                </div>
            </article>
            <article class="blog__post">
                <a class="blog__post-top" href="#">
                    <img src="assets/images/blog/2.png" />
                </a>
                <div class="blog__post-bottom">
                    <h2 class="blog__post-bottom-title">
                        <a href="#">
                            Risk vs. Reward-The Extra Burn
                        </a>
                    </h2>
                    <div class="blog__post-bottom-info">
                        <img class="blog__post-icon" src="assets/images/blog/blog-icon.svg" />
                        <span class="blog__post-separator">|</span>
                        <p class="blog__post-bottom-meta-line">
                            November 15th, 2017
                        </p>
                        <span class="blog__post-separator">|</span>
                        <div class="blog__post-bottom-meta-view">
                            <img class="blog__post-icon" src="assets/images/blog/icon-white.svg" />
                                <span class="blog__post-text">
                                    725
                                </span>
                        </div>
                        <span class="blog__post-separator">|</span>
                        <div class="blog__post-bottom-meta-likes">
                            <img class="blog__post-icon" src="assets/images/blog/icon-heart-white.svg" />
                                <span class="blog__post-text">
                                    2+
                                </span>
                        </div>
                    </div>
                </div>
            </article>
            <article class="blog__post">
                <a class="blog__post-top" href="#">
                    <img src="assets/images/blog/3.png" />
                </a>
                <div class="blog__post-bottom">
                    <h2 class="blog__post-bottom-title">
                        <a href="#">
                            Results! Never Leave Home To Find Them!
                        </a>
                    </h2>
                    <div class="blog__post-bottom-info">
                        <img class="blog__post-icon" src="assets/images/blog/blog-icon.svg" />
                        <span class="blog__post-separator">|</span>
                        <p class="blog__post-bottom-meta-line">
                            November 15th, 2017
                        </p>
                        <span class="blog__post-separator">|</span>
                        <div class="blog__post-bottom-meta-view">
                            <img class="blog__post-icon" src="assets/images/blog/icon-white.svg" />
                                <span class="blog__post-text">
                                    371
                                </span>
                        </div>
                        <span class="blog__post-separator">|</span>
                        <div class="blog__post-bottom-meta-likes">
                            <img class="blog__post-icon" src="assets/images/blog/icon-heart-white.svg" />
                                <span class="blog__post-text">
                                    3+
                                </span>
                        </div>
                    </div>
                </div>
            </article>
            <article class="blog__post">
                <a class="blog__post-top" href="#">
                    <img src="assets/images/blog/4.png" />
                </a>
                <div class="blog__post-bottom">
                    <h2 class="blog__post-bottom-title">
                        <a href="#">
                            HOW Do You Get Rid of Cellulite?
                        </a>
                    </h2>
                    <div class="blog__post-bottom-info">
                        <img class="blog__post-icon" src="assets/images/blog/blog-icon.svg" />
                        <span class="blog__post-separator">|</span>
                        <p class="blog__post-bottom-meta-line">
                            November 15th, 2017
                        </p>
                        <span class="blog__post-separator">|</span>
                        <div class="blog__post-bottom-meta-view">
                            <img class="blog__post-icon" src="assets/images/blog/icon-white.svg" />
                                <span class="blog__post-text">
                                    5,388
                                </span>
                        </div>
                        <span class="blog__post-separator">|</span>
                        <div class="blog__post-bottom-meta-likes">
                            <img class="blog__post-icon" src="assets/images/blog/icon-heart-white.svg" />
                                <span class="blog__post-text">
                                    23+
                                </span>
                        </div>
                    </div>
                </div>
            </article>
            <article class="blog__post">
                <a class="blog__post-top" href="#">
                    <img src="assets/images/blog/1.jpg" />
                </a>
                <div class="blog__post-bottom">
                    <h2 class="blog__post-bottom-title">
                        <a href="#">
                            The Best and The Worst Cardio For Building a Booty
                        </a>
                    </h2>
                    <div class="blog__post-bottom-info">
                        <img class="blog__post-icon" src="assets/images/blog/blog-icon.svg" />
                        <span class="blog__post-separator">|</span>
                        <p class="blog__post-bottom-meta-line">
                            November 27th, 2017
                        </p>
                        <span class="blog__post-separator">|</span>
                        <div class="blog__post-bottom-meta-view">
                            <img class="blog__post-icon" src="assets/images/blog/icon-white.svg" />
                                <span class="blog__post-text">
                                    9,028
                                </span>
                        </div>
                        <span class="blog__post-separator">|</span>
                        <div class="blog__post-bottom-meta-likes">
                            <img class="blog__post-icon" src="assets/images/blog/icon-heart-white.svg" />
                                <span class="blog__post-text">
                                    0
                                </span>
                        </div>
                    </div>
                </div>
            </article>
            <article class="blog__post">
                <a class="blog__post-top" href="#">
                    <img src="assets/images/blog/2.png" />
                </a>
                <div class="blog__post-bottom">
                    <h2 class="blog__post-bottom-title">
                        <a href="#">
                            Risk vs. Reward-The Extra Burn
                        </a>
                    </h2>
                    <div class="blog__post-bottom-info">
                        <img class="blog__post-icon" src="assets/images/blog/blog-icon.svg" />
                        <span class="blog__post-separator">|</span>
                        <p class="blog__post-bottom-meta-line">
                            November 15th, 2017
                        </p>
                        <span class="blog__post-separator">|</span>
                        <div class="blog__post-bottom-meta-view">
                            <img class="blog__post-icon" src="assets/images/blog/icon-white.svg" />
                                <span class="blog__post-text">
                                    725
                                </span>
                        </div>
                        <span class="blog__post-separator">|</span>
                        <div class="blog__post-bottom-meta-likes">
                            <img class="blog__post-icon" src="assets/images/blog/icon-heart-white.svg" />
                                <span class="blog__post-text">
                                    2+
                                </span>
                        </div>
                    </div>
                </div>
            </article>
            <article class="blog__post">
                <a class="blog__post-top" href="#">
                    <img src="assets/images/blog/3.png" />
                </a>
                <div class="blog__post-bottom">
                    <h2 class="blog__post-bottom-title">
                        <a href="#">
                            Results! Never Leave Home To Find Them!
                        </a>
                    </h2>
                    <div class="blog__post-bottom-info">
                        <img class="blog__post-icon" src="assets/images/blog/blog-icon.svg" />
                        <span class="blog__post-separator">|</span>
                        <p class="blog__post-bottom-meta-line">
                            November 15th, 2017
                        </p>
                        <span class="blog__post-separator">|</span>
                        <div class="blog__post-bottom-meta-view">
                            <img class="blog__post-icon" src="assets/images/blog/icon-white.svg" />
                                <span class="blog__post-text">
                                    371
                                </span>
                        </div>
                        <span class="blog__post-separator">|</span>
                        <div class="blog__post-bottom-meta-likes">
                            <img class="blog__post-icon" src="assets/images/blog/icon-heart-white.svg" />
                                <span class="blog__post-text">
                                    3+
                                </span>
                        </div>
                    </div>
                </div>
            </article>
            <article class="blog__post">
                <a class="blog__post-top" href="#">
                    <img src="assets/images/blog/4.png" />
                </a>
                <div class="blog__post-bottom">
                    <h2 class="blog__post-bottom-title">
                        <a href="#">
                            HOW Do You Get Rid of Cellulite?
                        </a>
                    </h2>
                    <div class="blog__post-bottom-info">
                        <img class="blog__post-icon" src="assets/images/blog/blog-icon.svg" />
                        <span class="blog__post-separator">|</span>
                        <p class="blog__post-bottom-meta-line">
                            November 15th, 2017
                        </p>
                        <span class="blog__post-separator">|</span>
                        <div class="blog__post-bottom-meta-view">
                            <img class="blog__post-icon" src="assets/images/blog/icon-white.svg" />
                                <span class="blog__post-text">
                                    5,388
                                </span>
                        </div>
                        <span class="blog__post-separator">|</span>
                        <div class="blog__post-bottom-meta-likes">
                            <img class="blog__post-icon" src="assets/images/blog/icon-heart-white.svg" />
                                <span class="blog__post-text">
                                    23+
                                </span>
                        </div>
                    </div>
                </div>
            </article>
            <article class="blog__post">
                <a class="blog__post-top" href="#">
                    <img src="assets/images/blog/1.jpg" />
                </a>
                <div class="blog__post-bottom">
                    <h2 class="blog__post-bottom-title">
                        <a href="#">
                            The Best and The Worst Cardio For Building a Booty
                        </a>
                    </h2>
                    <div class="blog__post-bottom-info">
                        <img class="blog__post-icon" src="assets/images/blog/blog-icon.svg" />
                        <span class="blog__post-separator">|</span>
                        <p class="blog__post-bottom-meta-line">
                            November 27th, 2017
                        </p>
                        <span class="blog__post-separator">|</span>
                        <div class="blog__post-bottom-meta-view">
                            <img class="blog__post-icon" src="assets/images/blog/icon-white.svg" />
                                <span class="blog__post-text">
                                    9,028
                                </span>
                        </div>
                        <span class="blog__post-separator">|</span>
                        <div class="blog__post-bottom-meta-likes">
                            <img class="blog__post-icon" src="assets/images/blog/icon-heart-white.svg" />
                                <span class="blog__post-text">
                                    0
                                </span>
                        </div>
                    </div>
                </div>
            </article>
            <article class="blog__post">
                <a class="blog__post-top" href="#">
                    <img src="assets/images/blog/2.png" />
                </a>
                <div class="blog__post-bottom">
                    <h2 class="blog__post-bottom-title">
                        <a href="#">
                            Risk vs. Reward-The Extra Burn
                        </a>
                    </h2>
                    <div class="blog__post-bottom-info">
                        <img class="blog__post-icon" src="assets/images/blog/blog-icon.svg" />
                        <span class="blog__post-separator">|</span>
                        <p class="blog__post-bottom-meta-line">
                            November 15th, 2017
                        </p>
                        <span class="blog__post-separator">|</span>
                        <div class="blog__post-bottom-meta-view">
                            <img class="blog__post-icon" src="assets/images/blog/icon-white.svg" />
                                <span class="blog__post-text">
                                    725
                                </span>
                        </div>
                        <span class="blog__post-separator">|</span>
                        <div class="blog__post-bottom-meta-likes">
                            <img class="blog__post-icon" src="assets/images/blog/icon-heart-white.svg" />
                                <span class="blog__post-text">
                                    2+
                                </span>
                        </div>
                    </div>
                </div>
            </article>
            <article class="blog__post">
                <a class="blog__post-top" href="#">
                    <img src="assets/images/blog/3.png" />
                </a>
                <div class="blog__post-bottom">
                    <h2 class="blog__post-bottom-title">
                        <a href="#">
                            Results! Never Leave Home To Find Them!
                        </a>
                    </h2>
                    <div class="blog__post-bottom-info">
                        <img class="blog__post-icon" src="assets/images/blog/blog-icon.svg" />
                        <span class="blog__post-separator">|</span>
                        <p class="blog__post-bottom-meta-line">
                            November 15th, 2017
                        </p>
                        <span class="blog__post-separator">|</span>
                        <div class="blog__post-bottom-meta-view">
                            <img class="blog__post-icon" src="assets/images/blog/icon-white.svg" />
                                <span class="blog__post-text">
                                    371
                                </span>
                        </div>
                        <span class="blog__post-separator">|</span>
                        <div class="blog__post-bottom-meta-likes">
                            <img class="blog__post-icon" src="assets/images/blog/icon-heart-white.svg" />
                                <span class="blog__post-text">
                                    3+
                                </span>
                        </div>
                    </div>
                </div>
            </article>
            <article class="blog__post">
                <a class="blog__post-top" href="#">
                    <img src="assets/images/blog/4.png" />
                </a>
                <div class="blog__post-bottom">
                    <h2 class="blog__post-bottom-title">
                        <a href="#">
                            HOW Do You Get Rid of Cellulite?
                        </a>
                    </h2>
                    <div class="blog__post-bottom-info">
                        <img class="blog__post-icon" src="assets/images/blog/blog-icon.svg" />
                        <span class="blog__post-separator">|</span>
                        <p class="blog__post-bottom-meta-line">
                            November 15th, 2017
                        </p>
                        <span class="blog__post-separator">|</span>
                        <div class="blog__post-bottom-meta-view">
                            <img class="blog__post-icon" src="assets/images/blog/icon-white.svg" />
                                <span class="blog__post-text">
                                    5,388
                                </span>
                        </div>
                        <span class="blog__post-separator">|</span>
                        <div class="blog__post-bottom-meta-likes">
                            <img class="blog__post-icon" src="assets/images/blog/icon-heart-white.svg" />
                                <span class="blog__post-text">
                                    23+
                                </span>
                        </div>
                    </div>
                </div>
            </article>
        </div>
        <div class="blog__load-more">
            Load more posts
        </div>
    </main>
@endsection
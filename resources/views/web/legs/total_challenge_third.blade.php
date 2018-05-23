@extends('web.layouts.app')
@section('content')
    <main class="legs-on-fire">
        <div class="legs-on-fire__navigation-wrapper">
            <nav class="legs-on-fire__navigation">
                <ul>
                    <li>
                        <a class="tab-link" href="{{route('legs-on-fire')}}">LEGS ON FIRE</a>
                    </li>
                    <li class="active">
                        <a class="tab-link" href="{{route('total-body-challenge')}}">TOTAL BODY CHALLENGE</a>
                        <ul class="sub-menu">
                            <li>
                                <a class="tab-link" href="{{route('total-body-challenge')}}">STEPS 1 TO 10</a>
                            </li>
                            <li>
                                <a class="tab-link" href="{{route('total-body-challenge-11-20')}}">STEPS 11 TO 20</a>
                            </li>
                            <li class="active">
                                <a class="tab-link" href="{{route('total-body-challenge-21-30')}}">STEPS 21 TO 30</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </nav>
        </div>
        <section class="legs-on-fire__content-wrapper">
            <div class="wrapper">
                <div class="legs-on-fire__content">
                    <div class="legs-on-fire__content-item odd">
                        <h3 class="legs-on-fire__content-item-title">
                            <span class="num">21</span>
                            DAY
                        </h3>
                        <div class="legs-on-fire__content-item-video-wrapper">
                            <iframe width="100%" height="100%" src="https://www.youtube.com/embed/ZqFjArkoSFE" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                        </div>
                    </div>
                    <div class="legs-on-fire__content-item even">
                        <h3 class="legs-on-fire__content-item-title">
                            <span class="num">22</span>
                            DAY
                        </h3>
                        <div class="legs-on-fire__content-item-video-wrapper">
                            <iframe width="100%" height="100%" src="https://www.youtube.com/embed/aRtte4Smyk4" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                        </div>
                    </div>
                    <div class="legs-on-fire__desktop-separate-line"></div>
                    <div class="legs-on-fire__content-item odd">
                        <h3 class="legs-on-fire__content-item-title">
                            <span class="num">23</span>
                            DAY
                        </h3>
                        <div class="legs-on-fire__content-item-video-wrapper">
                            <iframe width="100%" height="100%" src="https://www.youtube.com/embed/u-UKqljkXco" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                        </div>
                    </div>
                    <div class="legs-on-fire__content-item even">
                        <h3 class="legs-on-fire__content-item-title">
                            <span class="num">24</span>
                            DAY
                        </h3>
                        <div class="legs-on-fire__content-item-video-wrapper">
                            <iframe width="100%" height="100%" src="https://www.youtube.com/embed/xV_okRZOz5k" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                        </div>
                    </div>
                    <div class="legs-on-fire__desktop-separate-line"></div>
                    <div class="legs-on-fire__content-item odd">
                        <h3 class="legs-on-fire__content-item-title">
                            <span class="num">25</span>
                            DAY
                        </h3>
                        <div class="legs-on-fire__content-item-video-wrapper">
                            <iframe width="100%" height="100%" src="https://www.youtube.com/embed/3kBpTiJ7lrI" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                        </div>
                    </div>
                    <div class="legs-on-fire__content-item">
                        <h3 class="legs-on-fire__content-item-title even">
                            <span class="num">26</span>
                            DAY
                        </h3>
                        <div class="legs-on-fire__content-item-video-wrapper">
                            <iframe width="100%" height="100%" src="https://www.youtube.com/embed/_yV1gPuQWbI" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                        </div>
                    </div>
                    <div class="legs-on-fire__desktop-separate-line"></div>
                    <div class="legs-on-fire__content-item odd">
                        <h3 class="legs-on-fire__content-item-title">
                            <span class="num">27</span>
                            DAY
                        </h3>
                        <div class="legs-on-fire__content-item-video-wrapper">
                            <iframe width="100%" height="100%" src="https://www.youtube.com/embed/Z_4eKcn3L7E" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                        </div>
                    </div>
                    <div class="legs-on-fire__content-item even">
                        <h3 class="legs-on-fire__content-item-title">
                            <span class="num">28</span>
                            DAY
                        </h3>
                        <div class="legs-on-fire__content-item-video-wrapper">
                            <iframe width="100%" height="100%" src="https://www.youtube.com/embed/Hss1hgXJOIQ" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                        </div>
                    </div>
                    <div class="legs-on-fire__desktop-separate-line"></div>
                    <div class="legs-on-fire__content-item odd">
                        <h3 class="legs-on-fire__content-item-title">
                            <span class="num">29</span>
                            DAY
                        </h3>
                        <div class="legs-on-fire__content-item-video-wrapper">
                            <iframe width="100%" height="100%" src="https://www.youtube.com/embed/75bW_ZkIajw" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                        </div>
                    </div>
                    <div class="legs-on-fire__content-item even">
                        <h3 class="legs-on-fire__content-item-title">
                            <span class="num">30</span>
                            DAY
                        </h3>
                        <div class="legs-on-fire__content-item-video-wrapper">
                            <iframe width="100%" height="100%" src="https://www.youtube.com/embed/OH__COJLFkc" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                        </div>
                    </div>
                </div>
                <div class="legs-on-fire__note-text">
                    <p>
                        *Results May Vary: Causes for being overweight or obese vary from person to person. Whether genetic or environmental, it should be noted that food intake, rates of metabolism and levels of exercise and physical exertion vary from person to person. This means weight loss results will also vary from person to person. No individual result should be seen as typical.
                    </p>
                </div>
            </div>
        </section>
    </main>
@endsection
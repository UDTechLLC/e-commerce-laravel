@extends('web.layouts.app')
@section('content')
    <main class="legs-on-fire">
        <div class="legs-on-fire__navigation-wrapper">
            <nav class="legs-on-fire__navigation">
                <ul>
                    <li class="active">
                        <a class="tab-link" href="{{route('videolibrary.legs-on-fire')}}">LEGS ON FIRE</a>
                        <ul class="sub-menu">
                            <li>
                                <a class="tab-link" href="{{route('videolibrary.legs-on-fire')}}">FIRST WEEK</a>
                            </li>
                            <li>
                                <a class="tab-link" href="{{route('videolibrary.legs-on-fire-week-2')}}">SECOND WEEK</a>
                            </li>
                            <li>
                                <a class="tab-link" href="{{route('videolibrary.legs-on-fire-week-3')}}">THIRD WEEK</a>
                            </li>
                            <li>
                                <a class="tab-link" href="{{route('videolibrary.legs-on-fire-week-4')}}">FOURTH WEEK</a>
                            </li>
                            <li class="active">
                                <a class="tab-link" href="{{route('videolibrary.legs-on-fire-week-5')}}">FIFTH WEEK</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a class="tab-link" href="{{route('videolibrary.total-body-challenge')}}">TOTAL BODY CHALLENGE</a>
                    </li>
                </ul>
            </nav>
        </div>
        <section class="legs-on-fire__introduction">
            <div class="wrapper">
                <h4 class="legs-on-fire__introduction-title">
                    INTRODUCTION
                </h4>
                <div class="legs-on-fire__introduction-video-wrapper">
                    <iframe width="100%" height="100%" src="https://www.youtube.com/embed/UvMzse3QUHo" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                </div>
            </div>
        </section>
        <section class="legs-on-fire__content-wrapper">
            <div class="wrapper">
                <div class="legs-on-fire__content">
                    <div class="legs-on-fire__content-item odd">
                        <h3 class="legs-on-fire__content-item-title">
                            <span class="num">29</span>
                            DAY
                        </h3>
                        <div class="legs-on-fire__content-item-video-wrapper">
                            <iframe width="100%" height="100%" src="https://www.youtube.com/embed/_o929MwOrx8" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                        </div>
                    </div>
                    <div class="legs-on-fire__content-item even">
                        <h3 class="legs-on-fire__content-item-title">
                            <span class="num">30</span>
                            DAY
                        </h3>
                        <div class="legs-on-fire__content-item-video-wrapper">
                            <iframe width="100%" height="100%" src="https://www.youtube.com/embed/f2smN0fMau0" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
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

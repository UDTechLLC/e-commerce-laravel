@extends('web.layouts.app')
@section('content')
    <main class="legs-on-fire">
        <div class="legs-on-fire__navigation-wrapper">
            <nav class="legs-on-fire__navigation">
                <ul>
                    <li>
                        <a class="tab-link" href="{{route('videolibrary.legs-on-fire')}}">LEGS ON FIRE</a>
                    </li>
                    <li class="active">
                        <a class="tab-link" href="{{route('videolibrary.total-body-challenge')}}">TOTAL BODY CHALLENGE</a>
                        <ul class="sub-menu">
                            <li>
                                <a class="tab-link" href="{{route('videolibrary.total-body-challenge')}}">STEPS 1 TO 10</a>
                            </li>
                            <li class="active">
                                <a class="tab-link" href="{{route('videolibrary.total-body-challenge-11-20')}}">STEPS 11 TO 20</a>
                            </li>
                            <li>
                                <a class="tab-link" href="{{route('videolibrary.total-body-challenge-21-30')}}">STEPS 21 TO 30</a>
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
                            <span class="num">11</span>
                            DAY
                        </h3>
                        <div class="legs-on-fire__content-item-video-wrapper">
                            <iframe width="100%" height="100%" src="https://www.youtube.com/embed/syiUVqRoiKQ" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                        </div>
                    </div>
                    <div class="legs-on-fire__content-item even">
                        <h3 class="legs-on-fire__content-item-title">
                            <span class="num">12</span>
                            DAY
                        </h3>
                        <div class="legs-on-fire__content-item-video-wrapper">
                            <iframe width="100%" height="100%" src="https://www.youtube.com/embed/oO5XqKcUEdA" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                        </div>
                    </div>
                    <div class="legs-on-fire__desktop-separate-line"></div>
                    <div class="legs-on-fire__content-item odd">
                        <h3 class="legs-on-fire__content-item-title">
                            <span class="num">13</span>
                            DAY
                        </h3>
                        <div class="legs-on-fire__content-item-video-wrapper">
                            <iframe width="100%" height="100%" src="https://www.youtube.com/embed/EFyiDFKq33k" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                        </div>
                    </div>
                    <div class="legs-on-fire__content-item even">
                        <h3 class="legs-on-fire__content-item-title">
                            <span class="num">14</span>
                            DAY
                        </h3>
                        <div class="legs-on-fire__content-item-video-wrapper">
                            <iframe width="100%" height="100%" src="https://www.youtube.com/embed/-0gEvpTdAKo" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                        </div>
                    </div>
                    <div class="legs-on-fire__desktop-separate-line"></div>
                    <div class="legs-on-fire__content-item odd">
                        <h3 class="legs-on-fire__content-item-title">
                            <span class="num">15</span>
                            DAY
                        </h3>
                        <div class="legs-on-fire__content-item-video-wrapper">
                            <iframe width="100%" height="100%" src="https://www.youtube.com/embed/2cQNF6Tjfk8" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                        </div>
                    </div>
                    <div class="legs-on-fire__content-item">
                        <h3 class="legs-on-fire__content-item-title even">
                            <span class="num">16</span>
                            DAY
                        </h3>
                        <div class="legs-on-fire__content-item-video-wrapper">
                            <iframe width="100%" height="100%" src="https://www.youtube.com/embed/upa9uAtWKJA" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                        </div>
                    </div>
                    <div class="legs-on-fire__desktop-separate-line"></div>
                    <div class="legs-on-fire__content-item odd">
                        <h3 class="legs-on-fire__content-item-title">
                            <span class="num">17</span>
                            DAY
                        </h3>
                        <div class="legs-on-fire__content-item-video-wrapper">
                            <iframe width="100%" height="100%" src="https://www.youtube.com/embed/C8tjlPs25z8" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                        </div>
                    </div>
                    <div class="legs-on-fire__content-item even">
                        <h3 class="legs-on-fire__content-item-title">
                            <span class="num">18</span>
                            DAY
                        </h3>
                        <div class="legs-on-fire__content-item-video-wrapper">
                            <iframe width="100%" height="100%" src="https://www.youtube.com/embed/EXZ_QwNbiTQ" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                        </div>
                    </div>
                    <div class="legs-on-fire__desktop-separate-line"></div>
                    <div class="legs-on-fire__content-item odd">
                        <h3 class="legs-on-fire__content-item-title">
                            <span class="num">19</span>
                            DAY
                        </h3>
                        <div class="legs-on-fire__content-item-video-wrapper">
                            <iframe width="100%" height="100%" src="https://www.youtube.com/embed/a12BhZfX-cI" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                        </div>
                    </div>
                    <div class="legs-on-fire__content-item even">
                        <h3 class="legs-on-fire__content-item-title">
                            <span class="num">20</span>
                            DAY
                        </h3>
                        <div class="legs-on-fire__content-item-video-wrapper">
                            <iframe width="100%" height="100%" src="https://www.youtube.com/embed/xoNTxoubSzc" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
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

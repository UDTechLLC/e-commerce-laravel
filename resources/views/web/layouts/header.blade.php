<header>
<div class="first-header">
    <div class="wrapper">
        <div class="flex flex-j--between flex-a--center flex--m-block">
            <div class="first-header__soc-links flex flex-a--center">
                <a href="https://www.facebook.com/shedfatnow" target="_blank"><i class="fab fa-facebook-f"></i></a>
                <a href="https://www.youtube.com/channel/UCEALCddkV4XQR-6qiJaA70Q" target="_blank"><i class="fab fa-youtube"></i></a>
                <a href="https://www.instagram.com/shedfat/" target="_blank"><i class="fab fa-instagram"></i></a>
                <a href="https://www.snapchat.com/add/shedfat" target="_blank"><i class="fab fa-snapchat-ghost"></i></a>
            </div>
            <div class="first-header__menu flex flex-a--center">
                <a href="{{url('shop')}}" class="first-header__menu-item">Shop</a>
                <mini-cart></mini-cart>

            </div>
        </div>
    </div>
</div>
<div class="second-header">
    <div class="wrapper">
        <div class="flex flex-j--between flex-a--center flex--m-block">
            <a href="/" class="header-logo">
                <img src="{{ asset('web/images/logos/Shedfat-logo.png')}}" alt="Shedfat-logo">
            </a>

            <button class="btn btn__mobile-menu">
                <i class="fas fa-bars"></i>
            </button>

            <div class="second-header__menu">


                <ul class="second-header__menu-items">
                    <li class="second-header__menu-item {!! Request::is('/')?'active':'' !!}">
                        <a href="{{url('/')}}">Home</a>
                    </li>
                    <li class="second-header__menu-item {!! Request::is('shop')?'active':'' !!}">
                        <a href="{{url('shop')}}">Shop</a>
                    </li>
                    <li class="second-header__menu-item {!! Request::is('faq')?'active':'' !!}">
                        <a href="{{url('faq')}}">FAQ</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>

</header>
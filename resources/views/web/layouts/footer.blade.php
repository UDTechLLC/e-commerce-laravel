<footer>
    <div class="subscribe">
        <div class="wrapper">
            <form action="{{ route('subscribe.footer') }}" class="subscribe__form" method="POST">
                {{ csrf_field() }}
                <h2 class="subscribe__title">Be part of our community</h2>
                <input type="email" name="email" required placeholder="Enter your email">
                <button class="btn subscribe__btn">Join Now</button>
            </form>
        </div>
    </div>
    <div class="first-footer">
        <div class="wrapper">
            <div class="flex flex-j--between flex-a--center flex--m-block">
                <ul class="first-footer__menu">
                    <li><a href="{{url('/')}}">Home</a></li>
                    <li><a href="{{url('about-us')}}">About us</a></li>
                    <li><a href="{{url('contact')}}">Contact</a></li>
                    <li><a href="{{url('return-policy')}}">Return Policy</a></li>
                    <li><a href="{{url('privacy-policy')}}">Privacy Policy</a></li>
                    <li><a href="{{url('weight-loss-disclaimer')}}">Weight Loss Disclaimer</a></li>
                </ul>

                <div class="first-footer__soc-links flex flex-a--center">
                    <a href="https://www.facebook.com/shedfatnow" target="_blank"><i class="fab fa-facebook-f"></i></a>
                    <a href="https://www.youtube.com/channel/UCEALCddkV4XQR-6qiJaA70Q" target="_blank"><i class="fab fa-youtube"></i></a>
                    <a href="https://www.instagram.com/shedfat/" target="_blank"><i class="fab fa-instagram"></i></a>
                    <a href="https://www.snapchat.com/add/shedfat" target="_blank"><i class="fab fa-snapchat-ghost"></i></a>
                </div>
            </div>
        </div>
    </div>
    <div class="second-footer">
        <div class="wrapper">
            <div class="flex flex-j--between flex-a--center flex--m-block">
                <p>Results May Vary: Causes for being overweight or obese vary from person to person*</p>
                <p>©2015 - 2018  ShedFat® - Do not copy. All rights reserved.</p>
            </div>
        </div>
    </div>
</footer>

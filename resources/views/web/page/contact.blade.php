@extends('web.layouts.app')
@section('title')
    Contact-@parent
@endsection
@section('content')
    <main class="contact">
        <section class="contact__section">
            <div class="wrapper">
                <form action="" class="validate-form not-valid" id="contact_form" method="POST">
                    {{ csrf_field() }}
                    <div class="contact__wrapper">
                        <div class="contact__form-group">
                            <input class="" type="text" name="name" placeholder="Name (required)" tabindex="1" required>
                        </div>
                        <div class="contact__form-group">
                            <input class="" type="email" name="email" id="contactEmail"  placeholder="Email (required)" tabindex="2" required>
                        </div>
                        <div class="contact__form-group">
                            <input class="" type="text" name="subject"  placeholder="Subject" tabindex="3">
                        </div>
                    </div>
                    <div class="contact__form-group">
                        <textarea class="" placeholder="Message" name="massage" cols="39" rows="4" tabindex="4" required></textarea>
                    </div>
                    <div class="contact__form-group">
                        <button class="contact__submit submit" tabindex="5">submit form</button>
                    </div>
                </form>
            </div>
        </section>
    </main>
    @endsection
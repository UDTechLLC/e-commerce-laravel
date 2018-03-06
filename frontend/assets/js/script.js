(function( $ ) {
    $( document ).ready( function() {
        if ( 0 < $( '#successStories' ).length ) {
            $( '#successStories' ).slick({
                autoplay: true,
                infinite: true,
                slidesToShow: 3,
                slidesToScroll: 1,
                responsive: [
                    {
                        breakpoint: 992,
                        settings: {
                            slidesToShow: 2
                        }
                    },
                    {
                        breakpoint: 742,
                        settings: {
                            slidesToShow: 1
                        }
                    }
                ]
            });
        }

        if ( 0 < $( '#prevWinnersSlider' ).length ) {
            $( '#prevWinnersSlider' ).slick({
                autoplay: true,
                arrows: false,
                dots: true,
                slidesToShow: 1,
                slidesToScroll: 1
            });
        }

        if ( 0 < $( '.customer-login-form' ).length ) {
            $( '.showlogin' ).on( 'click', function() {
                $( '.customer-login-form' ).slideToggle();
                return false;
            });
        }
        if ( 0 < $( '.create-account-block' ).length ) {
            $( '#bdCreateAccount' ).on( 'change', function () {
                $( '.create-account-block' ).slideToggle();
            });
        }
        if ( 0 < $( '#bdCountry' ).length ) {
            $( '#bdCountry' ).select2();
        }
        if ( 0 < $( '.deliver-select' ).length ) {
            $( '.deliver-select' ).select2();
        }
        /*if ( 0 < $( '.add-to-cart-btn' ).length ) {
            $( '.add-to-cart-btn' ).on( 'click', function () {
                $( '.side-cart-block-wrapper' ).slideToggle(500,"swing");
                /!*if ( $( '.side-cart-block-wrapper' ).hasClass( 'show-cart' ) ) {
                    $( '.side-cart-block-wrapper' ).show("slide", { direction: "left" }, 3000);
                } else {
                    alert( 'test' );
                    $( '.side-cart-block-wrapper' ).hide("slide", { direction: "right" }, 3000);
                }*!/
                return false;
            });

        }*/
        if ( ( 0 < $( '#shipToDifferentAddressCheckbox' ).length ) && ( 0 < $( '.contacts-block' ).length ) ) {
            $( '#shipToDifferentAddressCheckbox' ).on( 'change', function () {
                $( '.contacts-block' ).slideToggle();
            });
        }

        $('.btn__mobile-menu').click(function () {
            $('.second-header__menu-items').slideToggle();
        });



        function heightMain() {

            setTimeout(function () {
                $('main').css({
                    'min-height': $(window).height() - $('footer').height() - $('header').height() - 3 + 'px'
                });
            },100)

        }
        heightMain();
        $(window).resize(function () {
            if ($(window).width() > 800){
                $('.second-header__menu-items').css({
                    'display': '',
                });
            }
            heightMain();
        });


        var body = $('body'),
            header_first = $('.first-header'),
            header_second = $('.second-header'),
            fixedTop = 53,
            mobileAddToCard = $('.add-to-cart-btn--mobile'),
            wrapperAddToCard = $('.add-to-cart-wrapper'),
            showBtnAfter = 1000;

        if ( 0 < wrapperAddToCard ) {
            setTimeout(function () {
                fixedTop = header_first.height() + 3;
                showBtnAfter = wrapperAddToCard.offset().top - 80;
            }, 100);
        }

        $(window).scroll(function () {
            var curScroll = $(window).scrollTop();

            curScroll >= fixedTop ? body.addClass('fixed-header') : body.removeClass('fixed-header');


            curScroll >= showBtnAfter ? mobileAddToCard.addClass('active'): mobileAddToCard.removeClass('active');


        });

        var faq_item = $('.faq__item>.flex');

        faq_item.click(function () {

           var wrapper =  $(this).parents('.faq__item'),
               generalWrapper = $('.faq__item'),
               removeActive = function () {
                    generalWrapper.removeClass('active');
           },
                showAnswer = function () {
                    wrapper.find('.faq__item-answer').slideDown(500);
           },
                hideAnswer = function () {
                    generalWrapper.find('.faq__item-answer').slideUp(500);
           };

           if(wrapper.hasClass('active')){
               removeActive();
               showAnswer();
               wrapper.find('.faq__item-answer').slideUp(500);
           }else {
               removeActive();
               wrapper.addClass('active');
               hideAnswer();
               showAnswer();

           }



        });

        var contactForm = $('.validate-form');

        var formValid = false;

        var inputNameValid = false;

        var inputMessageValid = false;

        var inputEmailValid = false;


            var inputName = $('.validate-form input[name="name"]');
            var inputEmail = $('.validate-form input[name="email"]');
            var message = $('.validate-form textarea');




        function CheckFormValid() {
                if(inputNameValid && inputMessageValid && inputEmailValid){
                           $('.contact__submit').prop('disabled', false);
                }else {
                    $('.contact__submit').prop('disabled', true);
                }
        }

        CheckFormValid();

        inputName.on("change keyup",function () {
            var nameIn = inputName.val();
            if(nameIn.length>2){
                inputNameValid = true;
                $(this).removeClass('not-valid').addClass('valid');
                CheckFormValid();
            }else {
                inputNameValid = false;
                $(this).removeClass('valid').addClass('not-valid');
                CheckFormValid();
            }
        });


        message.on("change keyup",function () {
            var nameIn = message.val();
            if(nameIn.length>5){
                inputMessageValid = true;
                $(this).removeClass('not-valid').addClass('valid');
                CheckFormValid();
            }else {
                inputMessageValid = false;
                $(this).removeClass('valid').addClass('not-valid');
                CheckFormValid();
            }
        });


        function checkEmail(email) {
            var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
            if (!reg.test(email)) return false;
            return true;
        }

            inputEmail.on("change keyup",function () {
                var email = $('#contactEmail').val();

             if(checkEmail(email)){
                 $(this).removeClass('not-valid').addClass('valid');
                 inputEmailValid = true;
                  CheckFormValid();
             }else {
                 $(this).removeClass('valid').addClass('not-valid');
                 inputEmailValid = false;
                  CheckFormValid();
             }
            });

    });
})( jQuery );
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

        if ( 0 < $( '.customer-login-form' ).length ) {
            $( '.showlogin' ).on( 'click', function() {
                $( '.customer-login-form' ).slideToggle();
                return false;
            });
        }
        if ( 0 < $( '.create-account-block' ).length ) {
            $( '#bdCreateAccount' ).on( 'change', function () {
                $( '.create-account-block' ).slideToggle();
            })
        }
        if ( 0 < $( '#bdCountry' ).length ) {
            $( '#bdCountry' ).select2();
        }
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


        setTimeout(function () {
            fixedTop = header_first.height() + 3;
            showBtnAfter = wrapperAddToCard.offset().top - 80;
        },100);

        $(window).scroll(function () {
            var curScroll = $(window).scrollTop();

            curScroll >= fixedTop ? body.addClass('fixed-header') : body.removeClass('fixed-header');


            curScroll >= showBtnAfter ? mobileAddToCard.addClass('active'): mobileAddToCard.removeClass('active');


        });



    });
})( jQuery );
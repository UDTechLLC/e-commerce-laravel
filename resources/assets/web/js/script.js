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

    });
})( jQuery );
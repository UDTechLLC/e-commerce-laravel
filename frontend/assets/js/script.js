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


        $(window).resize(function () {
            if ($(window).width() > 800){
                $('.second-header__menu-items').css({
                    'display': '',
                });
            }
        })

    });
})( jQuery );
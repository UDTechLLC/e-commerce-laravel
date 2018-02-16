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
    });
})( jQuery );
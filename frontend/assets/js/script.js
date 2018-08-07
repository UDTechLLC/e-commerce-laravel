(function ($) {
  var body = $('body');

  $(document).ready(function () {

    if (0 < $('#successStories').length) {
      $('#successStories').slick({
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

    if (0 < $('#prevWinnersSlider').length) {
      $('#prevWinnersSlider').slick({
        autoplay: true,
        arrows: false,
        dots: true,
        slidesToShow: 1,
        slidesToScroll: 1
      });
    }

    if (0 < $('#FBSlider').length) {
      $('#FBSlider').slick({
        autoplay: true,
        arrows: false,
        dots: true,
        slidesToShow: 1,
        slidesToScroll: 1
      });
    }

    if (0 < $('.customer-login-form').length) {
      $('.showlogin').on('click', function () {
        $('.customer-login-form').slideToggle();
        return false;
      });
    }
    if (0 < $('.create-account-block').length) {
      $('#bdCreateAccount').on('change', function () {
        $('.create-account-block').slideToggle();
      });
    }
    // if (0 < $('#bdCountry').length) {
    //   $('#bdCountry').select2();
    // }
    // if ( 0 < $( '.deliver-select' ).length ) {
    //   $( '.deliver-select' ).select2({
    //       minimumResultsForSearch: -1
    //   });
    // }


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
    if (( 0 < $('#shipToDifferentAddressCheckbox').length ) && ( 0 < $('.contacts-block').length )) {
      $('#shipToDifferentAddressCheckbox').on('change', function () {
        $('.contacts-block').slideToggle();
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
      }, 100)

    }

    heightMain();
    $(window).resize(function () {
      if ($(window).width() > 800) {
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

    if (0 < wrapperAddToCard) {
      setTimeout(function () {
        fixedTop = header_first.height() + 3;
        showBtnAfter = wrapperAddToCard.offset().top - 80;
      }, 100);
    }

    $(window).scroll(function () {
      var curScroll = $(window).scrollTop();
      var header = $('header');
      curScroll >= fixedTop ? body.addClass('fixed-header') : body.removeClass('fixed-header');

      curScroll >= fixedTop && document.querySelector('.timer')!==null ? header.css('padding-bottom','120px') : header.css('padding-bottom','0');

      if (curScroll >= showBtnAfter) {
        mobileAddToCard.addClass('active');
        $('.zopim').css('margin-bottom', "55px")
      } else {
        mobileAddToCard.removeClass('active');
        $('.zopim').css('margin-bottom', "0px")
      }

    });

    var faq_item = $('.faq__item>.flex');

    faq_item.click(function () {

      var wrapper = $(this).parents('.faq__item'),
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

      if (wrapper.hasClass('active')) {
        removeActive();
        showAnswer();
        wrapper.find('.faq__item-answer').slideUp(500);
      } else {
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
      if (inputNameValid && inputMessageValid && inputEmailValid) {
        $('.contact__submit').prop('disabled', false);
      } else {
        $('.contact__submit').prop('disabled', true);
      }
    }

    CheckFormValid();

    inputName.on("change keyup", function () {
      var nameIn = inputName.val();
      if (nameIn.length > 2) {
        inputNameValid = true;
        $(this).removeClass('not-valid').addClass('valid');
        CheckFormValid();
      } else {
        inputNameValid = false;
        $(this).removeClass('valid').addClass('not-valid');
        CheckFormValid();
      }
    });


    message.on("change keyup", function () {
      var nameIn = message.val();
      if (nameIn.length > 5) {
        inputMessageValid = true;
        $(this).removeClass('not-valid').addClass('valid');
        CheckFormValid();
      } else {
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

    inputEmail.on("change keyup", function () {
      var email = $('#contactEmail').val();

      if (checkEmail(email)) {
        $(this).removeClass('not-valid').addClass('valid');
        inputEmailValid = true;
        CheckFormValid();
      } else {
        $(this).removeClass('valid').addClass('not-valid');
        inputEmailValid = false;
        CheckFormValid();
      }
    });

    var cart = {
      btnBuy: $('.add-to-cart-btn'),
      wrap: $('.modal-dialog'),
      btnClose: $('.close-cart'),
      bg: $('.sideCartModal__bg'),
      fnCall: function () {
        setTimeout(function () {
          var cartButtonAreaHeight = $( '.side-cart-block .cart-button-area-wrapper' ).outerHeight();
          var cartFooterHeight = $( '.side-cart-block  .side-cart-footer-wrapper' ).outerHeight();
          var cartProductsHeight = $( window ).height() - cartButtonAreaHeight - cartFooterHeight;
          if ( 800 < $( window ).width() ) {
            $('.side-cart-block .cart-products-wrapper').height(cartProductsHeight - 50);
          } else {
            $('.side-cart-block .cart-products-wrapper').height(cartProductsHeight - 20);
          }
          cart.wrap.addClass('active');
          cart.bg.fadeIn();
          body.css('overflow', 'hidden');
        }, 400);
      },
      fnClose: function () {
        cart.wrap.removeClass('active');
        cart.bg.fadeOut();
        body.css('overflow', 'auto');
      }

    };

    $('.header-cart').click(function () {
      cart.fnCall();
    });

    var CallPopUp = function (name) {

      var btnAddToCart = $('.add-to-cart-btn[data-title="' + name + '"]'),

          PopUpWrapepr = $('.popUp[data-modal="' + name + '"]'),
          btnPopUpClose = PopUpWrapepr.find('.popUp__close'),
          blockInfo = PopUpWrapepr.find('.popUp__wrapper'),
          btnNoThanks = PopUpWrapepr.find('.no-thanks'),
          btnLearnMore = PopUpWrapepr.find('.learn-more');


      let showPopUp = true;

      btnAddToCart.click(function () {
        if (!$(this).hasClass('added')) {
          $('body').css('overflow', 'hidden');
          PopUpWrapepr.addClass('popUp--open');
          setTimeout(function () {
            blockInfo.addClass('popUp__wrapper--show');
          }, 100)
        }

        let btnText = $(this).text();
        btnText = btnText.replace(/(\r\n|\n|\r| )/gm, '').toLowerCase();
        if (btnText === 'register') {
          showPopUp = false;
        }
        const title = $(this).data('title');

        if (title !== 'SPRING CHALLENGE' && title !== 'Shedfat Dad Hat') {
          $(this).addClass('added');
        }


      });

      PopUpWrapepr.click(function (e) {
        if ($(e.target).is('.popUp')) {
          btnPopUpClose.click();
        }
      });
      btnNoThanks.click(function () {
        btnPopUpClose.click();
      });
      btnLearnMore.click(function () {
        btnPopUpClose.click();
        setTimeout(function () {
          $('html,body').animate({
                scrollTop: $('.parallax-section').offset().top - 45
              },
              'slow');
        }, 600);
      });
      btnPopUpClose.click(function () {
        body.css('overflow', 'auto');
        blockInfo.removeClass('popUp__wrapper--show');
        setTimeout(function () {
          PopUpWrapepr.removeClass('popUp--open');
        }, 500);
        console.log(showPopUp);
        if (showPopUp)
          cart.fnCall();

        var title = $(this).parents().find('.callPopUp').data('title');
        if (title === 'SPRING CHALLENGE')
          body.css('overflow', 'auto');
      });
    };

    CallPopUp('bogo-12week-custom-meal-plan');
    CallPopUp('12week-custom-meal-plan');
    CallPopUp('bogo-12week-custom-training-plan');
    CallPopUp('12week-custom-training-plan');
    CallPopUp('12 Week Custom Training Plan');
    CallPopUp('12 Week Custom Meal Plan');
    CallPopUp('SPRING CHALLENGE');
    CallPopUp('Shedfat Dad Hat');
    CallPopUp('shedfat-maxx');

    cart.btnBuy.click(function () {
      if (!$(this).data('title')) cart.fnCall();

      if (!$('.popUp__wrapper').is(':visible')) cart.fnCall();
    });

    cart.btnClose.click(function () {
      cart.fnClose();
    });

    cart.bg.click(function () {
      cart.fnClose();
    });


    /*
     setTimeout(function () {
     $('.callPopUp').click();
     },2000)*/

    /// challenge
    /* $('.sc-register-button').click(function (e) {
       e.preventDefault();
       $('.callPopUp').click();
     });*/

    var vimeo = {
      btn: $('.custom-video-block__wrapper-click'),
    };

    vimeo.btn.click(function () {
      $(this).addClass('active');
      $(this).parent('.custom-video-block__inner').find('iframe')[0].src += '?autoplay=1';
    });


    var mobile = {
      btnSub: $('.has-submenu span')
    };

    mobile.btnSub.click(function () {
      $(this).parents('.has-submenu')
          .toggleClass('open')
          .find('ul').slideToggle();
    })

    if ( 0 < $('#shareButton').length ) {
      $('#shareButton').on( 'click', function () {
        $( this ).parent( '.blog-post__content-share' ).children( '.blog-post__content-share-list' ).toggleClass( 'active' );
      })
    }

  });


  var option = $('.product-select_option.active').data('option');
  var optionText = $('.product-select_option.active').text();

  function getSbscrVal(val,text) {
    $('.product-select__current').text(text);
    $('#select_option').val(val);
  };

  getSbscrVal(option,optionText);


  $('.product-select_option').click(function () {
    option = $(this).data('option');
    optionText = $(this).text();
    getSbscrVal(option,optionText);
    $('.product-select_option').removeClass('active');
    $(this).addClass('active');
    $('.product-select_option-wrapper').hide();
    setTimeout(function () {
      $('.product-select_option-wrapper').css('display','');
    },100)
  })




  //timer



  /*document.addEventListener('DOMContentLoaded', () => {
      var flipdown = new FlipDown(1523902200, 'flipdown').start();
  });*/


})(jQuery);

(function($) {
  $(document).ready(function() {
    if($(".menu").length > 0) {
      new $.fn.ScrollMagicService;
    }

    $('.menu__btn__wrapper').on('click', function() {
      var $menu = $('.menu__fixed');

      if(!$menu.hasClass('open') ) {
        $('.menu__fixed').removeClass('close').addClass('open')
        $('body').addClass('cant_move')
      } else {
        $('.menu__fixed').removeClass('open').addClass('close')
        $('body').removeClass('cant_move')
      }

    });

    var film_roll = new FilmRoll({
      container: '.simpleSlider--itemWrapper',
      pager: false,
      configure_load: true,
      next: '.simpleSlider--next',
      prev: '.simpleSlider--prev'
    });

    $('.simpleSlider--itemWrapper').on('film_roll:resized film_roll:moved film_roll:dom_ready', function() {
      var position = ($(window).width() - $('.simpleSlider--item.active').outerWidth()) / 2
      $('.simpleSlider--prev').css({
        left: position + 'px'
      });

      $('.simpleSlider--next').css({
        right: position + 'px'
      });
    })

    var film_roll2 = new FilmRoll({
      container: '.regionSlider--itemWrapper',
      pager: true,
      configure_load: true,
      next: '.regionSlider--next',
      prev: '.regionSlider--prev'
    });

    $('.regionSlider--itemWrapper').on('film_roll:resized film_roll:moved film_roll:dom_ready', function() {
      var position = ($(window).width() - $('.regionSlider--item.active').outerWidth()) / 2
      $('.regionSlider--prev').css({
        left: position + 'px'
      });

      $('.regionSlider--next').css({
        right: position + 'px'
      });
    })


    //////// form


    //Important Note

//This pen Copyrighted (c) 2016 by Nikhil Krishnan (https://codepen.io/nikhil8krishnan/pen/ALLLkv). If you have any query please let me know at nikhil8krishnan@gmail.com.


//material contact form animation
    var floatingField = $('.material-form .floating-field').find('.form-control');
    var formItem = $('.material-form .input-block').find('.form-control');

//##case 1 for default style
//on focus
    formItem.focus(function() {
      $(this).parent().parent().addClass('focus');
    });
//removing focusing
    formItem.blur(function() {
      $(this).parent().parent().removeClass('focus');
    });

//##case 2 for floating style
//initiating field
    floatingField.each(function() {
      var targetItem = $(this).parent();
      if($(this).val()) {
        $(targetItem).addClass('has-value');
      }
    });

//on typing
    floatingField.blur(function() {
      $(this).parent().parent().removeClass('focus');
      //if value is not exists
      if($(this).val().length == 0) {
        $(this).parent().parent().removeClass('has-value');
      } else {
        $(this).parent().parent().addClass('has-value');
      }
    });

//dropdown list
    /*
    $('body').click(function() {
      if($('.custom-select .drop-down-list').is(':visible')) {
        $('.custom-select').parent().removeClass('focus');
      }
      $('.custom-select .drop-down-list:visible').scrollMagic__smoothSlideUp();
    });
    */
    $('.custom-select .active-list').click(function() {
      $(this).parent().parent().addClass('focus');
      $(this).parent().find('.drop-down-list').stop(true, true).delay(10).slideToggle(300);
    });
    $('.custom-select .drop-down-list li').click(function() {
      var listParent = $(this).parent().parent();
      //listParent.find('.active-list').trigger("click");
      listParent.parent('.select-block').removeClass('focus').addClass('added');
      listParent.find('.active-list').text($(this).text());
      listParent.find('input.list-field').attr('value', $(this).text());
    });

    var marker

    var initMap = function() {
      var lpc = {lat: 43.987552, lng: 4.299509};
      var map = new google.maps.Map(document.getElementById('map'), {
        zoom: 10,
        center: lpc
      });
      var custom_marker = $('.marker--template').clone();
      custom_marker.removeAttr('style');
      custom_marker.attr('id', 'infoWindow')
      var contentString = custom_marker[0];
      var infowindow = new google.maps.InfoWindow({
        content: contentString,
        pixelOffset: new google.maps.Size(-150, 185),
        maxWidth: 250
      });

      marker = new google.maps.Marker({
        position: lpc,
        map: map,
        title: 'Le puits carré'
      });

      google.maps.event.addListenerOnce(map, 'tilesloaded', function() {
        infowindow.open(map, marker);
        $('.gm-style-iw').parent().addClass('tool');
        $('.tool >div:not(.gm-style-iw)').remove();
      });
    }

    if($("#map").length > 0) {
      $('body').on('googlemapapiloaded', function() {
        initMap();
        $(marker).click()
      })
    }

    $('.open-popup-link').magnificPopup({
      type: 'inline',
      midClick: true, // Allow opening popup on middle mouse click. Always set it to true if you don't provide alternative source in href.
      closeBtnInside: true,
      callbacks: {
        open: function() {
          var self = this;
          $("body").trigger({
            type: "popup--open",
            popup: self.container[0]
          });
        },
        close: function() {
          var self = this;
          $("body").trigger({
            type: "popup--close",
            popup: self.container[0]
          });
        }
      }
    });

    var $cta = $('.cta_svgWrapper');

    if($cta.length > 0) {
      var setCtaBottom = function() {
        var $intro = $('.intro');
        if($intro.length > 0) {
          if($(window).width() > 767) {
            $cta.css({
              "bottom": $('.intro').outerHeight(true) + 'px'
            });
          } else {
            $cta.css({
              "bottom": $('.mobile_intro--title').outerHeight(true) + 'px'
            });
          }
        } else {
          $cta.css({
            "bottom": '0px'
          });
        }
      }

      setCtaBottom();

      $(window).on('resize', function() {
        setCtaBottom()
      });

    }

    $(".menu__panel .menu-item").each(function(index){
      var s = 0.2
      $(this).css({
        'animation-delay' : s*(1+index) + 's'
      });
    });

    $('.galleryItem').magnificPopup({
      type: 'image'
    });
  });
}(jQuery));

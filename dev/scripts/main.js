(function ($) {
  $(document).ready(function () {
    if ($(".menu").length > 0) {
      new $.fn.ScrollMagicService;
    }

    $('.menu__btn__wrapper').on('click', function () {
      $('.menu__fixed').toggleClass('open')
      $('body').toggleClass('cant_move')
    });

    var film_roll = new FilmRoll({
      container: '.simpleSlider--itemWrapper',
      pager: false,
      configure_load: true,
      next: '.simpleSlider--next',
      prev: '.simpleSlider--prev'
    });

    $('.simpleSlider--itemWrapper').on('film_roll:resized film_roll:moved film_roll:dom_ready', function () {
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

    $('.regionSlider--itemWrapper').on('film_roll:resized film_roll:moved film_roll:dom_ready', function () {
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
    formItem.focus(function () {
      $(this).parent('.input-block').addClass('focus');
    });
//removing focusing
    formItem.blur(function () {
      $(this).parent('.input-block').removeClass('focus');
    });

//##case 2 for floating style
//initiating field
    floatingField.each(function () {
      var targetItem = $(this).parent();
      if ($(this).val()) {
        $(targetItem).addClass('has-value');
      }
    });

//on typing
    floatingField.blur(function () {
      $(this).parent('.input-block').removeClass('focus');
      //if value is not exists
      if ($(this).val().length == 0) {
        $(this).parent('.input-block').removeClass('has-value');
      } else {
        $(this).parent('.input-block').addClass('has-value');
      }
    });

//dropdown list
    $('body').click(function () {
      if ($('.custom-select .drop-down-list').is(':visible')) {
        $('.custom-select').parent().removeClass('focus');
      }
      $('.custom-select .drop-down-list:visible').scrollMagic__smoothSlideUp();
    });
    $('.custom-select .active-list').click(function () {
      $(this).parent().parent().addClass('focus');
      $(this).parent().find('.drop-down-list').stop(true, true).delay(10).slideToggle(300);
    });
    $('.custom-select .drop-down-list li').click(function () {
      var listParent = $(this).parent().parent();
      //listParent.find('.active-list').trigger("click");
      listParent.parent('.select-block').removeClass('focus').addClass('added');
      listParent.find('.active-list').text($(this).text());
      listParent.find('input.list-field').attr('value', $(this).text());
    });

    var marker

    var initMap = function () {
      var lpc = {lat: 43.987552, lng: 4.299509};
      var map = new google.maps.Map(document.getElementById('map'), {
        zoom: 10,
        center: lpc
      });
      var contentString = '<div id="infoWindow" class="center">' +
        '<h2 id="firstHeading"><i class="icon-lpc__logo"></i> Le puits carré</h2>' +
        '<div class="left infoWindow--content">' +
        '<p>32, rue de Sainte-Eulalie</p>' +
        '<p>30190 Garrigues-Sainte-Eulalie</p>' +
        '<p>Tél : 04 66 58 94 93</p>' +
        '<a class=" btn btn__blue btn__large"  target="_blank" href="https://www.google.fr/maps/dir/\'\'/32+Place+des+Retraites+Sainte-Eulalie,+30190+Garrigues-Sainte-Eulalie/data=!4m5!4m4!1m0!1m2!1m1!1s0x12b43668b01ea3c5:0xa55bcbb67beff68e?sa=X&ved=0ahUKEwj67a77mrvWAhUqKMAKHQr7B3EQwwUIJzAA">Itinéraire</a>' +
        '</div>' +
        '</div>';

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

    if ($("#map").length > 0) {
      console.log('titi')
      $('body').on('googlemapapiloaded', function () {
        console.log('toto')
        initMap();
        $(marker).click()
      })
    }

  });
}(jQuery));

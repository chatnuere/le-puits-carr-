(function($) {
  var ScrollMagicService = $.fn.ScrollMagicService = function() {
    this.checkMobiles();
    this.controller = new ScrollMagic.Controller();
    this.init();
  };

  ScrollMagicService.prototype.init = function() {
    this.header();

    if(!this.isMobile) {
      this.general();
      this.roomsHome();
      this.selection();
      this.intro();
      this.footer();
      this.house();
      this.rooms();
      this.introImg();
    }
  };

  ScrollMagicService.prototype.header = function() {
    var stickyHeaderClass = "sticky";
    var header = $(".menu");

    // Init ScrollMagic Controller
    var scrollMagicController = this.controller;

    new ScrollMagic.Scene({
      offset: 101
    })
      .on("enter leave", function(e) {
        if(e.type === "enter") {
          header.addClass(stickyHeaderClass);
          $('body').addClass('scrolled');
        } else {
          header.removeClass(stickyHeaderClass);
          $('body').removeClass('scrolled');
        }
      })
      .addTo(scrollMagicController);

    // Animation will be ignored and replaced by scene value in this example
    var tween = TweenMax.to('.menu__logo ', 0.5, {
      scale: 0.75,
      top: 16
    });


    // Create the Scene and trigger when visible
    var scene = new ScrollMagic.Scene({
      offset: 1,
      duration: 100 /* How many pixels to scroll / animate */
    })
      .setTween(tween)
      .addTo(scrollMagicController);

    // Animation will be ignored and replaced by scene value in this example
    var tween2 = TweenMax.to('.menu__logo h2, .menu__logo h3', 0.5, {
      scale: 0.75,
      top: 16,
      height: 1,
      overflow: 'hidden',
      margin: 0,
      opacity: 0
    });

    var scene2 = new ScrollMagic.Scene({
      offset: 51,
      duration: 100 /* How many pixels to scroll / animate */
    })
      .setTween(tween2)
      .addTo(scrollMagicController);


    var tween3 = TweenMax.to('.menu__fixed ', 0.5, {
      backgroundColor: '#fff',
      boxShadow: "0px 1px 5px 0px rgba(124, 139, 151, 0.27)"
    });


    var scene3 = new ScrollMagic.Scene({
      offset: 75,
      duration: 100 /* How many pixels to scroll / animate */
    })
      .setTween(tween3)
      .addTo(scrollMagicController);


    // contact BTN

    var scrollMagic__introSlideup = TweenMax.fromTo('.menu__contact', 1.5,
      {opacity: 1, x: "-150%"},
      {opacity: 1, x: '0%'}
    );

    // Create the Scene and trigger when visible with ScrollMagic
    new ScrollMagic.Scene({offset: 0, ease: 'linear'})
      .setTween(scrollMagic__introSlideup)
      .addTo(scrollMagicController);
  };

  ScrollMagicService.prototype.roomsHome = function() {
    //rooms sliding
    var scrollMagicController = this.controller;
    var offset = -(parseInt($(window).height() / 2.5));

    $('.anim__tweenOdd').each(function() {
      var id = '#' + $(this).attr('id');

      ///// puits home
      var img = TweenMax.fromTo(id + ' .room__image-wrapper', 0.6,
        {opacity: 0, x: "-30%"},
        {opacity: 1, x: '0%'}
      );

      var title = TweenMax.fromTo(id + ' .room__text-title', 0.8,
        {opacity: 0.3, x: "10%"},
        {opacity: 1, x: '0%'}
      );

      var titleReturn = TweenMax.fromTo(id + ' .room__text-title-return', 0.8,
        {opacity: 0.3, x: "13%"},
        {opacity: 1, x: '0%'}
      );

      var text = TweenMax.fromTo(id + ' .room__text-content', 0.8,
        {opacity: 0.3, y: "50%"},
        {opacity: 1, y: '0%'}
      );

      var action = TweenMax.fromTo(id + ' .room__text-actions', 0.8,
        {opacity: 0.3, y: "50%"},
        {opacity: 1, y: '0%'}
      );

      new ScrollMagic.Scene({
        triggerElement: id + " .room__image-wrapper",
        offset: offset
      })
        .setTween(img)
        .addTo(scrollMagicController);

      new ScrollMagic.Scene({
        triggerElement: id + " .room__text-title",
        offset: offset
      })
        .setTween(title)
        .addTo(scrollMagicController);

      new ScrollMagic.Scene({
        triggerElement: id + " .room__text-title-return",
        offset: offset
      })
        .setTween(titleReturn)
        .addTo(scrollMagicController);

      new ScrollMagic.Scene({
        triggerElement: id + " .room__text-content",
        offset: offset
      })
        .setTween(text)
        .addTo(scrollMagicController);

      new ScrollMagic.Scene({
        triggerElement: id + " .room__text-actions",
        offset: offset
      })
        .setTween(action)
        .addTo(scrollMagicController);
    });

    // voutes homes

    $('.anim__tweenEven').each(function() {
      var id = '#' + $(this).attr('id');

      console.log(id)

      var img = TweenMax.fromTo(id + ' .room__image-wrapper', 0.6,
        {opacity: 0, x: "30%"},
        {opacity: 1, x: '0%'}
      );

      var title = TweenMax.fromTo(id + ' .room__text-title', 0.8,
        {opacity: 0.3, x: "-10%"},
        {opacity: 1, x: '0%'}
      );

      var titleReturn = TweenMax.fromTo(id + ' .room__text-title-return', 0.8,
        {opacity: 0.3, x: "-13%"},
        {opacity: 1, x: '0%'}
      );

      var text = TweenMax.fromTo(id + ' .room__text-content', 0.8,
        {opacity: 0.3, y: "50%"},
        {opacity: 1, y: '0%'}
      );

      var action = TweenMax.fromTo(id + ' .room__text-actions', 0.8,
        {opacity: 0.3, y: "50%"},
        {opacity: 1, y: '0%'}
      );

      new ScrollMagic.Scene({
        triggerElement: id + " .room__image-wrapper",
        offset: offset
      })
        .setTween(img)
        .addTo(scrollMagicController);

      new ScrollMagic.Scene({
        triggerElement: id + " .room__text-title",
        offset: offset
      })
        .setTween(title)
        .addTo(scrollMagicController);

      new ScrollMagic.Scene({
        triggerElement: id + " .room__text-title-return",
        offset: offset
      })
        .setTween(titleReturn)
        .addTo(scrollMagicController);

      new ScrollMagic.Scene({
        triggerElement: id + " .room__text-content",
        offset: offset
      })
        .setTween(text)
        .addTo(scrollMagicController);

      new ScrollMagic.Scene({
        triggerElement: id + " .room__text-actions",
        offset: offset
      })
        .setTween(action)
        .addTo(scrollMagicController);
    });
  };

  ScrollMagicService.prototype.house = function() {
    //rooms sliding
    var scrollMagicController = this.controller;
    var offset = -(parseInt($(window).height() / 2.5));


    ///// puits home
    var img = TweenMax.fromTo('#houseFirst .room__image-wrapper', 0.6,
      {opacity: 0, x: "-30%"},
      {opacity: 1, x: '0%'}
    );

    var title = TweenMax.fromTo('#houseFirst .room__text-title', 0.8,
      {opacity: 0.3, x: "10%"},
      {opacity: 1, x: '0%'}
    );

    var text = TweenMax.fromTo('#houseFirst .room__text-content', 0.8,
      {opacity: 0.3, y: "50%"},
      {opacity: 1, y: '0%'}
    );

    new ScrollMagic.Scene({
      triggerElement: "#houseFirst .room__image-wrapper",
      offset: offset
    })
      .setTween(img)
      .addTo(scrollMagicController);

    new ScrollMagic.Scene({
      triggerElement: "#houseFirst .room__text-title",
      offset: offset
    })
      .setTween(title)
      .addTo(scrollMagicController);


    new ScrollMagic.Scene({
      triggerElement: "#houseFirst .room__text-content",
      offset: offset
    })
      .setTween(text)
      .addTo(scrollMagicController);


    // voutes homes

    var img = TweenMax.fromTo('#houseSecond .room__image-wrapper', 0.6,
      {opacity: 0, x: "30%"},
      {opacity: 1, x: '0%'}
    );

    var title = TweenMax.fromTo('#houseSecond .room__text-title', 0.8,
      {opacity: 0.3, x: "-10%"},
      {opacity: 1, x: '0%'}
    );

    var text = TweenMax.fromTo('#houseSecond .room__text-content', 0.8,
      {opacity: 0.3, y: "50%"},
      {opacity: 1, y: '0%'}
    );

    new ScrollMagic.Scene({
      triggerElement: "#houseSecond .room__image-wrapper",
      offset: offset
    })
      .setTween(img)
      .addTo(scrollMagicController);

    new ScrollMagic.Scene({
      triggerElement: "#houseSecond .room__text-title",
      offset: offset
    })
      .setTween(title)
      .addTo(scrollMagicController);

    new ScrollMagic.Scene({
      triggerElement: "#houseSecond .room__text-content",
      offset: offset
    })
      .setTween(text)
      .addTo(scrollMagicController);
  };

  ScrollMagicService.prototype.rooms = function() {
    //rooms sliding
    var scrollMagicController = this.controller;
    var offset = -(parseInt($(window).height() / 2.5));

    $('.anim__roomtweenOdd').each(function() {
      var id = '#' + $(this).attr('id');
      ///// puits home
      var img = TweenMax.fromTo(id + ' .room__image-wrapper', 0.6,
        {opacity: 0, x: "-30%"},
        {opacity: 1, x: '0%'}
      );

      var title = TweenMax.fromTo(id + ' .room__text-title', 0.8,
        {opacity: 0.3, x: "10%"},
        {opacity: 1, x: '0%'}
      );

      var text = TweenMax.fromTo(id + ' .room__text-content', 0.8,
        {opacity: 0.3, y: "50%"},
        {opacity: 1, y: '0%'}
      );

      new ScrollMagic.Scene({
        triggerElement: id + " .room__image-wrapper",
        offset: offset
      })
        .setTween(img)
        .addTo(scrollMagicController);

      new ScrollMagic.Scene({
        triggerElement: id + " .room__text-title",
        offset: offset
      })
        .setTween(title)
        .addTo(scrollMagicController);

      new ScrollMagic.Scene({
        triggerElement: id + " .room__text-content",
        offset: offset
      })
        .setTween(text)
        .addTo(scrollMagicController);

    });
    // voutes homes

    $('.anim__roomtweenEven').each(function() {
      var id = '#' + $(this).attr('id');

      var img = TweenMax.fromTo(id + ' .room__image-wrapper', 0.6,
        {opacity: 0, x: "30%"},
        {opacity: 1, x: '0%'}
      );

      var title = TweenMax.fromTo(id + ' .room__text-title', 0.8,
        {opacity: 0.3, x: "-10%"},
        {opacity: 1, x: '0%'}
      );

      var text = TweenMax.fromTo(id + ' .room__text-content', 0.8,
        {opacity: 0.3, y: "50%"},
        {opacity: 1, y: '0%'}
      );

      new ScrollMagic.Scene({
        triggerElement: id + " .room__image-wrapper",
        offset: offset
      })
        .setTween(img)
        .addTo(scrollMagicController);

      new ScrollMagic.Scene({
        triggerElement: id + " .room__text-title",
        offset: offset
      })
        .setTween(title)
        .addTo(scrollMagicController);

      new ScrollMagic.Scene({
        triggerElement: id + " .room__text-content",
        offset: offset
      })
        .setTween(text)
        .addTo(scrollMagicController);
    });
  };

  ScrollMagicService.prototype.intro = function() {
    var scrollMagicController = this.controller;

    $('.scrollMagic__introSlideup').each(function() {
      var currentStrong = this;

      var scrollMagic__introSlideup = TweenMax.fromTo(currentStrong, 1.5,
        {opacity: 1, y: "100%"},
        {opacity: 1, y: '0%'}
      );

      // Create the Scene and trigger when visible with ScrollMagic
      new ScrollMagic.Scene({offset: 0, ease: 'linear'})
        .setTween(scrollMagic__introSlideup)
        .addTo(scrollMagicController);
    });
  };

  ScrollMagicService.prototype.selection = function() {

  };

  ScrollMagicService.prototype.room = function() {

  };

  ScrollMagicService.prototype.general = function() {
    var scrollMagicController = this.controller;
    var offset = -(parseInt($(window).height() / 2.5));

    $('.scrollMagic__smoothSlideUp').each(function() {
      var currentStrong = this;

      var scrollMagic__smoothSlideUp = TweenMax.fromTo(currentStrong, 0.8,
        {opacity: 0.3, y: "30%"},
        {opacity: 1, y: '0%'}
      );

      if($(this).hasClass('scrollMagic__footerOffset')) {
        offset = -(parseInt($(window).height() / 2));
      }

      // Create the Scene and trigger when visible with ScrollMagic
      var sceneRoomLeft = new ScrollMagic.Scene({
        triggerElement: currentStrong,
        offset: offset
      })
        .setTween(scrollMagic__smoothSlideUp)
        .addTo(scrollMagicController);
    });

    $('.scrollMagic__bigSlideUp').each(function() {
      var currentStrong = this;

      var scrollMagic__smoothSlideUp = TweenMax.fromTo(currentStrong, 0.8,
        {opacity: 0.3, y: "100%"},
        {opacity: 1, y: '0%'}
      );

      if($(this).hasClass('scrollMagic__footerOffset')) {
        offset = -(parseInt($(window).height() / 2));
      }

      // Create the Scene and trigger when visible with ScrollMagic
      var sceneRoomLeft = new ScrollMagic.Scene({
        triggerElement: currentStrong,
        offset: offset
      })
        .setTween(scrollMagic__smoothSlideUp)
        .addTo(scrollMagicController);
    });


    $('.scrollMagic__smoothSlideLeft').each(function() {
      var currentStrong = this;

      var scrollMagic__smoothSlideLeft = TweenMax.fromTo(currentStrong, 0.8,
        {opacity: 0.3, x: "-15%"},
        {opacity: 1, x: '0%'}
      );

      if($(this).hasClass('scrollMagic__footerOffset')) {
        offset = -(parseInt($(window).height() / 2));
      }

      // Create the Scene and trigger when visible with ScrollMagic
      var sceneRoomLeft = new ScrollMagic.Scene({
        triggerElement: currentStrong,
        offset: offset
      })
        .setTween(scrollMagic__smoothSlideLeft)
        .addTo(scrollMagicController);
    });


    $('.scrollMagic__smoothSlideRight').each(function() {
      var currentStrong = this;

      var scrollMagic__smoothSlideRight = TweenMax.fromTo(currentStrong, 0.8,
        {opacity: 0.3, x: "15%"},
        {opacity: 1, x: '0%', ease: Circ.easeOut}
      );

      if($(this).hasClass('scrollMagic__footerOffset')) {
        offset = -(parseInt($(window).height() / 2));
      }

      // Create the Scene and trigger when visible with ScrollMagic
      var sceneRoomLeft = new ScrollMagic.Scene({
        triggerElement: currentStrong,
        offset: offset
      })
        .setTween(scrollMagic__smoothSlideRight)
        .addTo(scrollMagicController);
    });


  };

  ScrollMagicService.prototype.footer = function() {
    // Init ScrollMagic Controller
    var scrollMagicController = this.controller;
    $('.footer--social-item').each(function(index) {
      var currentStrong = this;

      var scrollMagic__smoothSlideUp = TweenMax.fromTo(currentStrong, 0.8,
        {opacity: 0.3, y: "100%"},
        {opacity: 1, y: '0%'}
      );

      if($(this).hasClass('scrollMagic__footerOffset')) {
        offset = -(parseInt($(window).height() / 2));
      }

      // Create the Scene and trigger when visible with ScrollMagic
      var sceneRoomLeft = new ScrollMagic.Scene({
        triggerElement: currentStrong,
        offset: (offset + ( 50 * index))
      })
        .setTween(scrollMagic__smoothSlideUp)
        .addTo(scrollMagicController);
    });
  };

  ScrollMagicService.prototype.checkMobiles = function() {
    this.isMobile = (function(a) {
      return /(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows ce|xda|xiino/i.test(a) || /1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(a.substr(0, 4))
    })(navigator.userAgent || navigator.vendor || window.opera);
  }

  ScrollMagicService.prototype.introImg = function() {
    // init controller
    var scrollMagicController = this.controller

    // Animation will be ignored and replaced by scene value in this example
    var tween = TweenMax.fromTo(".top_section--img", 1,
      {backgroundPositionY: 0},
      {backgroundPositionY: 50}
    );



    // Create the Scene and trigger when visible
    var scene = new ScrollMagic.Scene({
      offset: 0,
      duration: $(window).height() /* How many pixels to scroll / animate */
    })
      .setTween(tween)
      .addTo(scrollMagicController);
  };
}(jQuery));


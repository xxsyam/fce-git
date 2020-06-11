const fce = fce || {};

fce.breakpoint = 980;
fce.windowWidth = $(window).innerWidth();
fce.windowHeight = $(window).innerHeight();

(function ($) {

  'use strict';

  fce.fn = {

    lineAnimation: {
      init: function () {
        this.event();
      },
      event: function () {
        var element = $(".bg-stripe");
        var line = '<div class="line"></div>'
        
        if (fce.windowWidth > fce.breakpoint) {
          //PC
          var num = 8;
        } else {
          //SP
          var num = 4;
        }

        for (var i = 0; i < num; i++){
          element.append(line);
        }

      }
    },
    
    triangleAnimation: {
      init: function() {
        this.event();
      },
      event: function () {
        
        const $container = $(".bg-triangle");
        const arrows = []

        for (var i = 0; i < 4; i++) {
          arrows.push(".svg-to-top");
          arrows.push(".svg-to-bottom");
        }

        for (var i = 0; i < arrows.length ; i++) {
          //▼の大きさ
          if (fce.windowWidth > fce.breakpoint) {
            //PC
            var w = Math.floor(Math.random() * (160 + 1 - 40) + 40);
          } else {
            //SP
            var w = Math.floor(Math.random() * (80 + 1 - 20) + 20);
          }

          var h = w * 0.9;
          var x = Math.random() * fce.windowWidth;
          var y = Math.random() * fce.windowHeight;
          var speed = Math.random() * (6 + 1 - 3) + 3;

          $(arrows[i])
            .clone()
            .css({
              width: w,
              height: h,
              left: x,
              top: y,
              animationDuration: speed + "s"
            })
            .appendTo($container)
        }
      }
    },

    globalmenu: {
      init: function() {
        this.event();
      },
      event: function() {
        let state = false;
        const $btn = $(".menubtn");
        const $menu = $(".globalmenu");
        const $link = $(".globalmenu a");

        function openMenu() {
          $menu.stop().slideDown(300);
          $menu.addClass("show");
          $btn.addClass("open");
          state = true;
        }
        function closeMenu() {
          $menu.stop().slideUp(300);
          $menu.removeClass("show");
          $btn.removeClass("open");
          state = false;
        }

        $btn.click(function() {
          if (state == false) {
            openMenu();
          } else {
            closeMenu();
          }
        });

        $link.click(function() {
          setTimeout(closeMenu, 200);
        });
      }
    },

    inview: {
      init: function() {
        this.event();
      },
      event: function() {
        $(".anim").on("inview", function(event, isInView) {
          if ($(this).hasClass("inview")) {
            return;
          }
          $(this).addClass("inview")
        });
      }
    },

    // ページ内スクロール
    smoothScroll: {
      init: function() {
        this.event();
      },
      event: function() {
        $('a[href^="#"]').click(function() {
          const href = $(this).attr("href");
          const target = $(href == "#" || href == "" ? "html" : href);
          const position = target.offset().top;
          $("html, body").animate({ scrollTop: position }, 500, "swing");
          return false;
        });
      }
    },

  }; //fn

  //Call Function
  fce.fn.lineAnimation.init();
  fce.fn.triangleAnimation.init();
  fce.fn.globalmenu.init();
  fce.fn.inview.init();
  fce.fn.smoothScroll.init();

  //リサイズ
  $(window).on("load resize", function () {
    fce.windowWidth = $(window).innerWidth();
    fce.windowHeight = $(window).innerHeight();
  });

  // ロード
  $(window).on("load", (function () {
    $(".header").delay(3000).fadeIn(500);
    $("html, body").animate({ scrollTop: 0 }, "1");
  }));

}(jQuery));

(function ($) {

  'use strict';

  fce.fn = {
    
    bgAnimation: {
      init: function() {
        this.event();
      },
      event: function () {
        
        const $container = $(".bg-triangle");
        const arrows = []

        for (var i = 0; i < 5; i++) {
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
          // var y = Math.random() * $container.outerHeight();

          var speed = Math.random() * (6 + 1 - 3) + 3;
          var angle = Math.random() * 360;
          // 角度をラジアンに変換
          var radian = angle * Math.PI / 180;
          // スピード(スカラ)と方向からxとyの成分に分解
          var vx = speed * Math.cos(radian);
          var vy = speed * Math.sin(radian);

          // console.log("vx:"+vx+"vy:"+vy)

          $(arrows[i])
            .clone()
            .css({
              width: w,
              height: h,
              left: x,
              top: y,
              transform: "rotate(" + angle + "deg)",
              animationDuration: speed + "s"
            })
            .appendTo($container)
            // .animate({ transform: "translateY(" + 9999 + "px)" }, 2000);
        }
      }
    }
  }

  fce.fn.bgAnimation.init();

}(jQuery));

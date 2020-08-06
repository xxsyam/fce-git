// ハンバーガー用
$(function(){
  $('.menu-trigger').on('click', function() {
    $(this).toggleClass('active');
    if($('.spnav').hasClass("active")){
      $('.spnav').removeClass("active");
      $('.spnav').addClass("disactive");
    }else{
      $('.spnav').removeClass("disactive");
      $('.spnav').addClass("active");
    }
    return false;
  });
  $('.spnav a').on('click', function() {
    $('.menu-trigger').removeClass('active');
    if($('.spnav').hasClass("disactive")){
      $('.spnav').removeClass("disactive");
    }else{
      $('.spnav').removeClass("active");
    }
    var speed = 500;
    var href= $(this).attr("href");
    var target = $(href == "#" || href == "" ? 'html' : href);
    var position = target.offset().top;
    $("html, body").animate({scrollTop:position}, speed, "swing");
    return false;
  });
});

// ページ内リンクのアニメーション（ヌルヌル）
$(function(){
  $('a[href^="#"]').click(function(){
    var speed = 500;
    var href= $(this).attr("href");
    var target = $(href == "#" || href == "" ? 'html' : href);
    var position = target.offset().top;
    $("html, body").animate({scrollTop:position}, speed, "swing");
    return false;
  });
});

// Slick
$(function(){
  // Home Service
  $('.service ul').slick({
    autoplay:false,
    autoplaySpeed:5000,
    dots:true,
    centerMode: false,
    slidesToShow:4,
    slidesToScroll:1,
    focusOnSelect:true,
    infinite:true,
    arrow:false,
    responsive: [
    {
      breakpoint: 1200,
      settings: {
        slidesToShow:4
      }
    },{
      breakpoint: 800,
      settings: {
        slidesToShow: 2
      }
    },{
      breakpoint: 540,
      settings: {
        slidesToShow: 1
      }
    }
  ]
  });
});

// フィルタ
$(document).ready(function() {
  $('.trigger').click(function() {
    var value = $(this).attr('data-filter');
    if (value == 'all') {
      $('.filter').show('1000');
    } else {
      $('.filter').not('.'+value).hide('1000');
      $('.filter').filter('.'+value).show('1000');
    }
    $(document).on('click', '.trigger', function () {
      $('.trigger').removeClass('active');
      $(this).addClass('active');
    });
  })
})

// inview関連
$(function() {
  $('.fIUp').on('inview', function(event, isInView) {
    if (isInView) {
    //表示領域に入った時
      $(this).addClass('fIUp');
      $(this).css('opacity',1);
    } else {
    //表示領域から出た時
      $(this).removeClass('fIUp');
      $(this).css('opacity',0); //非表示にしておく
    }
  });
});

"use strict";var fce=fce||{};fce.breakpoint=980,fce.windowWidth=$(window).innerWidth(),fce.windowHeight=$(window).innerHeight(),function(s){fce.fn={lineAnimation:{init:function(){this.event()},event:function(){var n=s(".bg-stripe");if(fce.windowWidth>fce.breakpoint)var i=8;else i=4;for(var t=0;t<i;t++)n.append('<div class="line"></div>')}},triangleAnimation:{init:function(){this.event()},event:function(){for(var n=s(".bg-triangle"),i=[],t=0;t<4;t++)i.push(".svg-to-top"),i.push(".svg-to-bottom");for(t=0;t<i.length;t++){if(fce.windowWidth>fce.breakpoint)var e=Math.floor(121*Math.random()+40);else e=Math.floor(61*Math.random()+20);var o=.9*e,a=Math.random()*fce.windowWidth,f=Math.random()*fce.windowHeight,c=4*Math.random()+3;s(i[t]).clone().css({width:e,height:o,left:a,top:f,animationDuration:c+"s"}).appendTo(n)}}},globalmenu:{init:function(){this.event()},event:function(){var n=!1,i=s(".menubtn"),t=s(".globalmenu"),e=s(".globalmenu a");function o(){t.stop().slideUp(300),t.removeClass("show"),i.removeClass("open"),n=!1}i.click(function(){0==n?(t.stop().slideDown(300),t.addClass("show"),i.addClass("open"),n=!0):o()}),e.click(function(){setTimeout(o,200)})}},inview:{init:function(){this.event()},event:function(){s(".anim").on("inview",function(n,i){s(this).hasClass("inview")||s(this).addClass("inview")})}},smoothScroll:{init:function(){this.event()},event:function(){s('a[href^="#"]').click(function(){var n=s(this).attr("href"),i=s("#"==n||""==n?"html":n).offset().top;return s("html, body").animate({scrollTop:i},500,"swing"),!1})}}},fce.fn.lineAnimation.init(),fce.fn.triangleAnimation.init(),fce.fn.globalmenu.init(),fce.fn.inview.init(),fce.fn.smoothScroll.init(),s(window).on("load resize",function(){fce.windowWidth=s(window).innerWidth(),fce.windowHeight=s(window).innerHeight()}),s(window).on("load",function(){s(".header").delay(3e3).fadeIn(500),s("html, body").animate({scrollTop:0},"1")})}(jQuery);

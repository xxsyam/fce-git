// ハンバーガー用
$(function(){
  $('.menu-trigger').on('click', function() {
    $(this).toggleClass('active');
    $('#nav-wrapper nav').toggleClass('active');
    return false;
  });
  $('#nav-wrapper nav.active').on('click', function() {
    $('#nav-wrapper nav.active').removeClass('active');
    $('.menu-trigger').removeClass('active');
    var speed = 500;
    var href= $(this).attr("href");
    var target = $(href == "#" || href == "" ? 'html' : href);
    var position = target.offset().top;
    $("html, body").animate({scrollTop:position}, speed, "swing");
    return false;
  });
  $('#nav-wrapper nav a').on('click', function() {
    $('#nav-wrapper nav').removeClass('active');
    $('.menu-trigger').removeClass('active');
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

  // 商品一覧用
  $('#KV_FIELD .slider_wrapper').slick({
    autoplay:false,
    autoplaySpeed:5000,
    dots:false,
    centerMode: true,
    centerPadding: '15%',
    slidesToShow:1,
    slidesToScroll:1,
    focusOnSelect:true,
    infinite:true,
    arrow:true,
    responsive: [
      {
        breakpoint: 800,
        settings: {
          centerMode: false,
          dots:true
        }
      },{
        breakpoint: 640,
        settings: {
          centerMode: false,
          dots:true
        }
      }
    ]
  });

  // お知らせ用
  $('.news_slider_wrapper').slick({
    autoplay:false,
    autoplaySpeed:5000,
    dots:false,
    centerMode: false,
    slidesToShow:4,
    slidesToScroll:1,
    focusOnSelect:true,
    infinite:true,
    arrow:false,
    responsive: [
      {
        breakpoint: 800,
        settings: {
          slidesToShow:2
        }
      },{
        breakpoint: 640,
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
  $('.dummy').on('inview', function(event, isInView) {
    if (isInView) {
    //表示領域に入った時
      $(this).addClass('fadeInDown');
    } else {
    //表示領域から出た時
      $(this).removeClass('fadeInDown');
      $(this).css('opacity',0); //非表示にしておく
    }
  });
  $('.dummy').on('inview', function(event, isInView) {
    if (isInView) {
      $(this).addClass('fadeInDown');
    } else {
      $(this).removeClass('fadeInDown');
      $(this).css('opacity',0);
    }
  });
});

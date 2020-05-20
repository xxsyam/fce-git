(function($) {
			$(function() {
				var $header = $('#header');

				// Nav Fixed
				$(window).scroll(function() {
					if ($(window).scrollTop() > 300) {
						$header.addClass('fixed');
					} else {
						$header.removeClass('fixed');
					}
				});

				// Nav Toggle Button
				$('#nav-toggle').click(function(){
					$header.toggleClass('open');
				});

			});
		})(jQuery);


var $filters = $('.filter [data-filter]'),
    $boxes = $('.boxes [data-category]');

$filters.on('click', function(e) {
  e.preventDefault();
  var $this = $(this);
  $filters.removeClass('active');
  $this.addClass('active');

  var $filterColor = $this.attr('data-filter');

  if ($filterColor == 'all') {
    $boxes.removeClass('is-animated')
      .fadeOut().promise().done(function() {
        $boxes.addClass('is-animated').fadeIn();
      });
  } else {
    $boxes.removeClass('is-animated')
      .fadeOut().promise().done(function() {
        $boxes.filter('[data-category = "' + $filterColor + '"]')
          .addClass('is-animated').fadeIn();
      });
  }
});



var scrollAnimationElm = document.querySelectorAll('.sa');
var scrollAnimationFunc = function() {
  for(var i = 0; i < scrollAnimationElm.length; i++) {
    var triggerMargin = 200;
    var elm = scrollAnimationElm[i];
    var showPos = 0;
    if(elm.dataset.sa_margin != null) {
      triggerMargin = parseInt(elm.dataset.sa_margin);
    }
    if(elm.dataset.sa_trigger) {
      showPos = document.querySelector(elm.dataset.sa_trigger).getBoundingClientRect().top + triggerMargin;
    } else {
      showPos = elm.getBoundingClientRect().top + triggerMargin;
    }
    if (window.innerHeight > showPos) {
      var delay = (elm.dataset.sa_delay)? elm.dataset.sa_delay : 0;
      setTimeout(function(index) {
        scrollAnimationElm[index].classList.add('show');
      }.bind(null, i), delay);
    }
  }
}
window.addEventListener('load', scrollAnimationFunc);
window.addEventListener('scroll', scrollAnimationFunc);



var scrollElm = (function() {
  if('scrollingElement' in document) {
    return document.scrollingElement;
  }
  if(navigator.userAgent.indexOf('WebKit') != -1) {
    return document.body;
  }
  return document.documentElement;
})();
 
$('a[href^="#"]').not('.noscroll').on('click', function() {
  var speed = 800;
  var easing = 'swing';
  var href= $(this).attr("href");
  $(scrollElm).animate({
    scrollTop: $(href == "#" ? 'html' : href).offset().top
  }, speed, easing);
  return false;
});
/*----------------------------------------------

	Theme Name: concreat5_site_la_palette
	Description: Common JavaScript 06-11-2018 (mm-dd-yyyy)
	Author: Shin'ichi Nakane
	Author URI: http://www.onside.com/about/
	Version: ver. 1.1

----------------------------------------------*/

$(document).ready(function() {

	if ( navigator.userAgent.indexOf('iPhone') > 0 || navigator.userAgent.indexOf('iPad') > 0 || navigator.userAgent.indexOf('iPod') > 0 || navigator.userAgent.indexOf('Android') > 0) {

	} else {
		$('#scroll-page-top').hide();
		$(function () {
			$(window).scroll(function () {
				if ($(this).scrollTop() > 100) {
					$('#scroll-page-top').fadeIn();
				} else {
					$('#scroll-page-top').fadeOut();
				}
			});
		});

		$(function () {
			$('#scroll-page-top a').click(function () {
				$('body,html').animate({
					scrollTop: 0
				}, 800);
				return false;
			});
		});
	}

});

$(function() {
  $('a[href*="#"]:not([href="#"])').click(function() {
    if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
      var target = $(this.hash);
      target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
      if (target.length) {
        $('html,body').animate({
          scrollTop: target.offset().top
        }, 800);
        return false;
      }
    }
  });
});
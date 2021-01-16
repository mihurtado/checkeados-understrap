(function($) {
	$(function () {
		$(document).scroll(function () {
			const $nav = $("nav.navbar");
			$nav.toggleClass('navbar--scrolled', $(this).scrollTop() > $nav.height());
		});
	});
})(jQuery);

/**
 * Sticky menu
 * http://blog.teamtreehouse.com/create-sticky-navigation
 */

(function ($) {

	$(function() {
		var primaryNav = $("#genesis-nav-primary"),
			navToggle = $('#mobile-genesis-nav-primary'),
			stickyClass = "-sticky",
			stickyThreshold = $('.site-header').height();
		$(window).on( 'scroll', function() {
			if ( $(this).scrollTop() > stickyThreshold ) {
				primaryNav.add(navToggle).addClass(stickyClass);
			} else {
				primaryNav.add(navToggle).removeClass(stickyClass);
			}
		});
	});

})(jQuery);

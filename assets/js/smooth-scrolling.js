////	Smooth Scrolling
// Scroll smoothly when an anchor is clicked,
// or the location.hash changes.
$(function () {
	// Cache the root
	var $root = $('html, body');
	function ScrollToHash(hash) {
		if ( $(hash).length > 0 ) {
			$root.animate({
				scrollTop: $(hash).offset().top
			}, 500, function () {
				window.location.hash = hash;
			});
		}
	}
	// Scroll on click.
	$('a').click(function() {
		var hash = $.attr(this, 'href');
		ScrollToHash(hash);
		return false;
	});
	// Scroll for back or forwward buttons.
	$(window).hashchange( function(){
		ScrollToHash(window.location.hash);
	});
	// Trigger on page load.
	$(window).hashchange();
});

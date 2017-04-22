////	Smooth Scrolling
// Scroll smoothly when an anchor is clicked,
// or the location.hash changes.
$(function () {
	function ScrollToHash(hash) {
		var $hash = $(hash);
		if ( $hash.length > 0 ) {
			$('html, body').animate({
				scrollTop: $hash.offset().top
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
	// Scroll for back or forward buttons.
	window.onhashchange = ( function(){
		ScrollToHash(window.location.hash);
	});
	// Trigger on page load.
	ScrollToHash(window.location.hash);
});

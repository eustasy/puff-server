////	External Links
// Open external links in a new tab.
$(function () {
	$('a').each(function () {
		if ( $(this).href.indexOf(window.location.host) === -1 ) {
			$(this).attr('target', '_blank');
		}
	});
});

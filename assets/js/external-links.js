////	External Links
// Open external links in a new tab.
$(function () {
	$('a').each(function () {
		if (
			// Check the link is defined.
			typeof this.href !== 'undefined' &&
			// Check the host isn't in the link.
			this.href.indexOf(window.location.host) === -1 &&
			// Check it's not a magnet or anything stupid.
			this.href.substring(0, 4).toLowerCase() === 'http'
		) {
			$(this).attr('target', '_blank');
		}
	});
});

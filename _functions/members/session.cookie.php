<?php

////	Set a session cookie and redirect.
// WARNING: Redirects.
// WARNING: Terminates page.
function Puff_Members_Session_Cookie($Session) {
	global $Sitewide;

	setcookie(
		'session', // Name
		$Session, // Value
		2147483647, // Expires (far future)
		'/', // Path
		$Sitewide['Request']['Host'], // Domain
		$Sitewide['Request']['Secure'], // Secure
		$Sitewide['Cookies']['HTTPOnly'] // HTTP Only
	);
	if ( $_GET['redirect'] ) {
		header('Location: '.urldecode($_GET['redirect']), true, 302);
	} else {
		header('Location: '.$Sitewide['Settings']['Site Root'], true, 302);
	}
	exit;
}

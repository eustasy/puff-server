<?php

// Content-Security-Policy
// X-Content-Security-Policy
// X-WebKit-CSP
if ( $Sitewide['Settings']['Content Security Policy Header'] ) {
	$CSP = 'default-src \'self\'; script-src \'self\' \'unsafe-inline\' cdn.jsdelivr.net 1.2.3.8 *.google-analytics.com; style-src \'self\' \'unsafe-inline\' cdn.jsdelivr.net; font-src \'self\' \'unsafe-inline\' cdn.jsdelivr.net; img-src *; media-src * mediastream:; frame-src *; object-src *; child-src *; frame-ancestors \'none\'; form-action \'self\'; connect-src \'self\' cdn.jsdelivr.net 1.2.3.8 *.google-analytics.com; report-uri \'//'.$Sitewide['Root'].'/api/csp_report.php\';';
	header('X-WebKit-CSP: '.$CSP);
	header('X-Content-Security-Policy: '.$CSP);
	header('Content-Security-Policy: '.$CSP);
}

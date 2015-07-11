<?php

if (
	$Sitewide['Settings']['Strip PHP from URLs'] &&
	substr($Sitewide['Request']['Path'], -4, 4) == '.php'
) {
	$Sitewide['Request']['Trimmed'] = $Sitewide['Request']['Scheme'].'://'.$Sitewide['Request']['Host'].substr($Sitewide['Request']['Path'], 0, -4);
	if ( $Sitewide['Request']['Query'] ) {
		$Sitewide['Request']['Trimmed'] .= '?'.$Sitewide['Request']['Query'];
	}
	if ( $Sitewide['Request']['Fragment'] ) {
		$Sitewide['Request']['Trimmed'] .= '#'.$Sitewide['Request']['Fragment'];
	}
	header ('HTTP/1.1 301 Moved Permanently');
	header ('Location: '.$Sitewide['Request']['Trimmed']);
}

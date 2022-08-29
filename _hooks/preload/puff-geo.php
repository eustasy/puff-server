<?php

use GeoIp2\Database\Reader;

if (
	!empty($Sitewide['Settings']['GeoLocate On Load']) &&
	is_readable($Sitewide['Puff']['Libs'].'geoip2.phar')
) {
	// Figure out IP
	if (!empty($_SERVER['HTTP_CF_CONNECTING_IP'])) {
		$ip = $_SERVER['HTTP_CF_CONNECTING_IP'];
	} else if (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
		$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
	} else if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
		$ip = $_SERVER['HTTP_CLIENT_IP'];
	} else if (!empty($_SERVER['REMOTE_ADDR'])) {
		$ip = $_SERVER['REMOTE_ADDR'];
	} else {
		$ip = false;
	}
	// Require GeoIP2
	require_once $Sitewide['Puff']['Libs'].'geoip2.phar';
	// Try and do the thing
	try {
		if (!class_exists('GeoIp2\Database\Reader')) {
			throw new \Exception('Class GeoIp2\Database\Reader not found');
		}
		$reader = new Reader($Sitewide['Puff']['Libs'].'GeoLite2-City.mmdb');
		$record = $reader->city($ip);
		$Sitewide['Geo']['Continent'] = $record->continent->code;
		$Sitewide['Geo']['Country']   = $record->country->isoCode;
	// Catch any failures, but be nice about it.
	} catch (\Exception $e) {
		// echo '<!-- '.$e->getMessage().' -->'."\n";
		$Sitewide['Geo']['Continent'] = false;
		$Sitewide['Geo']['Country']   = false;
	}
} else {
	$Sitewide['Geo']['Continent'] = false;
	$Sitewide['Geo']['Country']   = false;
}

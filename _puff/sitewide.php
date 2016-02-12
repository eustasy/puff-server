<?php

////	Puff
// Puff is installed in the current directory.
$Sitewide['Puff']['Root']      = __DIR__.'/';
$Sitewide['Puff']['Cron']      = $Sitewide['Puff']['Root'].'../_cron/';
$Sitewide['Puff']['Functions'] = $Sitewide['Puff']['Root'].'../_functions/';
$Sitewide['Puff']['Hooks']     = $Sitewide['Puff']['Root'].'../_hooks/';
$Sitewide['Puff']['Libs']      = $Sitewide['Puff']['Root'].'../_libs/';
$Sitewide['Puff']['Settings']  = $Sitewide['Puff']['Root'].'../_settings/';

////	Pre-load necessary functions.
require_once $Sitewide['Puff']['Functions'].'core/glob_recursive.php';
require_once $Sitewide['Puff']['Functions'].'core/require_all_once.php';

////	Require the Configuration
// Core at 0
require_once $Sitewide['Puff']['Settings'].'core.default.php';
// Defaults first.
foreach (glob_recursive($Sitewide['Puff']['Settings'].'*.default.php') as $File) {
	require_once $File;
}
// Others second.
require_all_once($Sitewide['Puff']['Settings']);
// Custom last.
if ( is_readable($Sitewide['Puff']['Settings'].'custom.php') ) {
	require $Sitewide['Puff']['Settings'].'custom.php';
}

////	Require other Functions if auto-loaded.
if ( $Sitewide['Settings']['AutoLoad']['Functions'] ) {
	require_all_once($Sitewide['Puff']['Functions']);
}

////	Request
// Scheme & Security
if (
	isset($_SERVER['HTTPS']) &&
	$_SERVER['HTTPS'] != 'off'
) {
	$Sitewide['Request']['Scheme'] = 'https';
	$Sitewide['Request']['Secure'] = true;
} else {
	$Sitewide['Request']['Scheme'] = 'http';
	$Sitewide['Request']['Secure'] = false;
}
// Host
$Sitewide['Request']['Host'] = filter_input(INPUT_SERVER, 'HTTP_HOST');
if ( empty($Sitewide['Request']['Host']) ) {
	$Sitewide['Request']['Host'] = filter_input(INPUT_SERVER, 'SERVER_NAME');
}
// Paths, Queries and Fragments
if ( isset($_SERVER['REQUEST_URI']) ) {
	$Sitewide['Request']['Path'] = explode('#', $_SERVER['REQUEST_URI']);
} else {
	$Sitewide['Request']['Path'] = array('');
}
if ( isset($Sitewide['Request']['Path'][1]) ) {
	$Sitewide['Request']['Fragment'] = $Sitewide['Request']['Path'][1];
} else {
	$Sitewide['Request']['Fragment'] = false;
}
$Sitewide['Request']['Path'] = explode('?', $Sitewide['Request']['Path'][0]);
if ( isset($Sitewide['Request']['Path'][1]) ) {
	$Sitewide['Request']['Query'] = $Sitewide['Request']['Path'][1];
} else {
	$Sitewide['Request']['Query'] = false;
}
$Sitewide['Request']['Path'] = $Sitewide['Request']['Path'][0];
// Full Address
$Sitewide['Request']['Full'] = $Sitewide['Request']['Scheme'].'://'.$Sitewide['Request']['Host'].$Sitewide['Request']['Path'];
if ( $Sitewide['Request']['Query'] ) {
	$Sitewide['Request']['Full'] .= '?'.$Sitewide['Request']['Query'];
}
if ( $Sitewide['Request']['Fragment'] ) {
	$Sitewide['Request']['Full'] .= '#'.$Sitewide['Request']['Fragment'];
}

////	Frontend
// Assume the root is 1 level up.
$Sitewide['Root']                = realpath(__DIR__.'/../').'/';

////	Templates
$Sitewide['Templates']['Root']   = $Sitewide['Root'].'_templates/';
$Sitewide['Templates']['Header'] = $Sitewide['Templates']['Root'].'header.php';
$Sitewide['Templates']['Footer'] = $Sitewide['Templates']['Root'].'footer.php';

////	Assets
$Sitewide['Assets']['Internal']['Root']      = $Sitewide['Root'].'assets/';
$Sitewide['Assets']['Internal']['JS']        = $Sitewide['Assets']['Internal']['Root'].'js/';
$Sitewide['Assets']['Internal']['CSS']       = $Sitewide['Assets']['Internal']['Root'].'css/';
$Sitewide['Assets']['Internal']['Image']     = $Sitewide['Assets']['Internal']['Root'].'images/';
$Sitewide['Assets']['External']['Root']      = $Sitewide['Settings']['Site Root'].'assets/';
$Sitewide['Assets']['External']['JS']        = $Sitewide['Assets']['External']['Root'].'js/';
$Sitewide['Assets']['External']['CSS']       = $Sitewide['Assets']['External']['Root'].'css/';
$Sitewide['Assets']['External']['Image']     = $Sitewide['Assets']['External']['Root'].'images/';
$Sitewide['Assets']['Extension']['JS']       = '.js';
$Sitewide['Assets']['Extension']['CSS']      = '.css';
$Sitewide['Assets']['Extension']['Image']    = '.png';

////	Cookies
$Sitewide['Cookies']['HTTPOnly'] = true;
$Sitewide['Cookies']['Prefix'] = str_replace('.', '_', $Sitewide['Request']['Host']);

////	Timezone
date_default_timezone_set('UTC');
$Time = time();
$Date = date(DATE_ATOM, $Time);

////	Preload Hook
puff_hook('preload');
// Load any page variables declared as $Page, just this one time.
if ( !empty($Sitewide['Page']) ) {
	$Page = $Sitewide['Page'];
}
if ( empty($Page['Images']) && !empty($Page['Image']) ) {
	$Page['Images'][] = $Page['Image'];
}

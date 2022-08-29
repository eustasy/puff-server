<?php

if ( isset($_COOKIE[$Sitewide['Settings']['Cookies Compliance']['Cookie']]) ) {
	setcookie($Sitewide['Settings']['Cookies Compliance']['Cookie'], $_COOKIE[$Sitewide['Settings']['Cookies Compliance']['Cookie']], 2147483647, '/', $Sitewide['Request']['Host'], $Sitewide['Request']['Secure'], $Sitewide['Cookies']['HTTPOnly']);
} else if ( !empty($Sitewide['Settings']['Cookies Compliance']['Auto Accept']) ) {
	setcookie($Sitewide['Settings']['Cookies Compliance']['Cookie'], 'auto-accepted', 2147483647, '/', $Sitewide['Request']['Host'], $Sitewide['Request']['Secure'], $Sitewide['Cookies']['HTTPOnly']);
}

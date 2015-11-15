<?php

////	Require All Once Function
// Requires all PHP files in a directory.
function require_all_once($Directory) {
	global $Sitewide;
	foreach (glob_recursive($Directory.'*.php') as $File) {
		require_once $File;
	}
}

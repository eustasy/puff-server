<?php

////	Require All Once Function
// Requires all PHP files in a directory.
function require_all_once($Directory, $ReturnList = false) {
	global $Sitewide;
	foreach (glob_recursive($Directory.'*.php') as $File) {
		if ( $File != realpath($Sitewide['Puff']['Settings'].'custom.php') ) {
			if ( $ReturnList ) {
				$List[] = $File;
			} else {
				require_once $File;
			}
		}
	}
	if ( $ReturnList ) {
		return $List;
	}
}

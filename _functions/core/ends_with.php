<?php

function ends_with($string, $test) {
	$strlen = strlen($string);
	$testlen = strlen($test);
	if ( $testlen > $strlen ) {
		return false;
	}
	return substr_compare($string, $test, $strlen - $testlen, $testlen) === 0;
}

<?php

function isJson($filename) {
	$string = file_get_contents($filename);
	json_decode($string);
	return (json_last_error() == JSON_ERROR_NONE);
}

require_once __DIR__.'/../_functions/glob_recursive.php';
$json_files = glob_recursive(__DIR__.'/../*.json');
$result['invalid_files'] = array();
$result['valid_files']   = array();

foreach ( $json_files as $filename ) {
	// Validate
	if ( isJson($filename) ) {
		$result['valid_files'][] = $filename;
	} else {
		$result['invalid_files'][] = $filename;
	}
}

var_dump($result);

if ( !empty($result['invalid_files']) ) {
	// That's an error
	exit(1);
}

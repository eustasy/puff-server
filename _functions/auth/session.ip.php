<?php

function Puff_Member_Session_IP() {

	$IP_Sources = array(
		'HTTP_CF_CONNECTING_IP',
		'HTTP_X_FORWARDED_FOR',
		'HTTP_CLIENT_IP',
		'REMOTE_ADDR'
	);

	$Filter = FILTER_VALIDATE_IP;
	$Options = FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE;

	foreach ( $IP_Sources as $IP_Source ) { 
		$IP = filter_input(INPUT_SERVER, $IP_Source, $Filter, $Options);
		if (!empty($IP)) {
			return $IP;
		}
	}

	return false;
}

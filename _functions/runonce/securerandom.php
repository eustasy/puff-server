<?php

function Puff_SecureRandom($Length = 64){
	if ( function_exists('random_bytes') ) {
		$Random = random_bytes($Length);
		$Strong = true;
	} else if ( function_exists('mcrypt_create_iv') ) {
		$Random = mcrypt_create_iv($Length);
		$Strong = true;
	} else if ( function_exists('openssl_random_pseudo_bytes') ) {
		// Don't set strong here because the function does it based on the source.
		$Random = openssl_random_pseudo_bytes($Length, $Strong);
	} else {
		$Strong = false;
	}
	if ( !$Strong ) {
		return false;
	}
	$Random = bin2hex($Random);
	return $Random;
}

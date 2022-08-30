<?php

////	Hash a Password
function Puff_Member_Password_Hash($Password, $Salt = false, $Method = false) {
	global $Sitewide, $Time;

	////	BCRYPT
	if (
		$Sitewide['Settings']['Members']['Password Retention']['BCRYPT'] &&
		(
			$Method == 'BCRYPT' ||
			!$Method
		)
	) {
		$Password = password_hash(
			$Password,
			PASSWORD_BCRYPT,
			array('cost' => $Sitewide['Settings']['Members']['Password Retention']['BCRYPT Cost'])
		);
		return array('Hash' => $Password, 'Salt' => '', 'Method' => 'BCRYPT');

	////	sha512
	// Hash the password,
	// then hash the result and the salt
	// (which is already a hexadecimal)
	} elseif (
		$Method == 'sha512' ||
		!$Method
	) {
		$Method == 'sha512';
		if ( !$Salt ) {
			$Salt = Puff_SecureRandom();
			if ( !$Salt ) {
				$Msg = 'Error: No secure source was available for Salt generation.';
				$Msg .= ' Your password could not be secured. This is not your fault.';
				return array('error' => $Msg);
			}
		}
		$Password = hash($Method, $Password);
		$Password = hash($Method, $Password . $Salt);
		return array('Hash' => $Password, 'Salt' => $Salt, 'Method' => $Method);

	////	PLAIN
	} elseif (
		$Sitewide['Settings']['Members']['Password Retention']['PLAIN'] &&
		$Method = 'PLAIN'
	) {
		return array('Hash' => $Password, 'Salt' => '', 'Method' => 'PLAIN');
	}
}

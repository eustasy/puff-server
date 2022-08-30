<?php

////	Decide if a Password needs upgrading
function Puff_Member_Password_Upgrade($Method, $Hash) {
	global $Sitewide;

	////	PLAIN
	if ( $Method == 'PLAIN' ) {
		return true;
	}

	////	sha512
	if ( $Method == 'sha512') {
		if ( $Sitewide['Settings']['Members']['Password Retention']['BCRYPT'] ) {
			return true;
		}
		return false;
	}

	////	BCRYPT
	if ( $Method == 'BCRYPT' ) {
		return password_needs_rehash(
			$Hash,
			PASSWORD_BCRYPT,
			array('cost' => $Sitewide['Settings']['Members']['Password Retention']['BCRYPT Cost'])
		);
	}
}

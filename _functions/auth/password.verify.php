<?php

////	Verify a Password against a given Hash, Salt, and Method
// WARNING: You should probably be using Puff_Member_Password_Use
function Puff_Member_Password_Verify($Password, $Hash, $Salt, $Method) {
	global $Sitewide, $Time;

	////	BCRYPT
	if (
		$Sitewide['Settings']['Members']['Password Retention']['BCRYPT'] &&
		(
			$Method == 'BCRYPT' ||
			!$Method
		)
	) {
		$Result = password_verify($Password, $Hash);
		return $Result;
	}

	////	Non-BCRYPT
	$Entry = Puff_Member_Password_Hash($Password, $Salt, $Method);
	if ( $Entry['Hash'] == $Hash ) {
		return true;
	}

	return false;
}

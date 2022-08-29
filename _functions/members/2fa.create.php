<?php

function Puff_Member_2FA_Create($Connection, $Username) {
	global $Sitewide, $Base32_Chars, $PHPQRCode;

	require_once $Sitewide['Puff']['Libs'].'authenticatron.php';

	////	Check Member Existence
	// For the sake of the space-time continuum,
	// new users should not already exist.
	$Username = Puff_Member_Sanitize_Username($Username);
	$MemberExists = Puff_Member_Exists($Connection, $Username);
	if ( !$MemberExists ) {
		return array('error' => 'Sorry, that user doesn\'t exist, so we can\'t make a session for it.');
	}

	////	Generate all the 2FA Stuff
	$Authenticatron = Authenticatron_New($Username);

	////	Update Database
	mysqli_query($Connection, 'UPDATE `Members` SET `2FA Secret`=\''.$Authenticatron['Secret'].'\' WHERE `Username`=\''.$Username.'\';');

	unset($Authenticatron['Secret']);
	return $Authenticatron;

}

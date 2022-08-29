<?php

////	Login a Member with a Password
function Puff_Member_Password_Login($Connection, $Username, $Password) {
	global $Sitewide, $Time;

	////	Check Member Existence
	$Username = Puff_Member_Sanitize_Username($Username);
	$MemberExists = Puff_Member_Exists($Connection, $Username);
	if ( !$MemberExists ) {
		return array('error' => 'USERNAME_INVALID');
	}

	////	Get the latest password information for that member.
	$Hashed = Puff_Member_Password_Get($Connection, $Username);

	////	Verify the entered password against the retrieved hash.
	$Verify = Puff_Member_Password_Verify($Password, $Hashed['Hash'], $Hashed['Salt'], $Hashed['Method']);
	if ( !$Verify ) {
		return array('error' => 'USERNAME_VALID__PASSWORD_INCORRECT');
	}

	////	Update last used if correct
	Puff_Member_Password_Use($Connection, $Username, $Hashed['Hash']);

	////	Autoupgrade
	// Detect if upgrade is needed
	$UpgradeNeeded = Puff_Member_Password_Upgrade($Hashed['Method'], $Hashed['Hash']);
	if ( $UpgradeNeeded ) {
		// If needed, upgrade and mark last used
		$Hashed = Puff_Member_Password_Set($Connection, $Username, $Password, $Time);
	}

	////	Create a session and return it
	$Session = Puff_Member_Session_Create($Connection, $Username);

	$Return = array(
		'session' => $Session['Session'],
		'password_auto_upgraded' => $UpgradeNeeded,
		'username' => $Username,
	);
	return $Return;
}

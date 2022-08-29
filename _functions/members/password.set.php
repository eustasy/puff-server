<?php

////	Set a new Password for an existing Member
function Puff_Member_Password_Set($Connection, $Username, $Password, $LastUsed = 0, $CurrentSession = false) {
	global $Sitewide, $Time;

	////	Check Member Existence
	$Username = Puff_Member_Sanitize_Username($Username);
	$MemberExists = Puff_Member_Exists($Connection, $Username);
	if ( !$MemberExists ) {
		return array('error' => 'Sorry, we can\'t change the password for a member that doesn\'t exist.');
	}

	////	Hash Password
	$Hashed = Puff_Member_Password_Hash($Password);

	////	Disable existing Sessions
	Puff_Member_Session_Disable_All($Connection, $Username, $CurrentSession);

	////	Insert new password into Database
	$New = 'INSERT INTO `Passwords` (`Username`, `Method`, `Hash`, `Salt`, `Created`, `Last used`) VALUES ';
	$New .= '(\''.$Username.'\', \''.$Hashed['Method'].'\', \''.$Hashed['Hash'].'\', ';
	$New .= '\''.$Hashed['Salt'].'\', \''.$Time.'\', \''.$LastUsed.'\');';
	$New = mysqli_query($Connection, $New);

	////	Clean up older passwords
	$CleanUp = 'DELETE FROM `Passwords` WHERE ';
	// TOO OLD
	$CleanUp .= '( `Username` = \''.$Username.'\' AND ';
	$CleanUp .= '`Created` <= '.( $Time - $Sitewide['Settings']['Members']['Password Retention']['Oldest'] ).') OR ';
	// PLAIN
	$CleanUp .= '`Method` = \'PLAIN\';';
	$CleanUp = mysqli_query($Connection, $CleanUp);

	$Result = array(
		'New' => $New,
		'CleanUp' => $CleanUp,
	);
	return $Result;
}

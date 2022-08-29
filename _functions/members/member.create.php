<?php

function Puff_Member_Create($Connection, $Username, $Password = false) {
	global $Sitewide, $Time;

	////	Check Member Existence
	// For the sake of the space-time continuum,
	// new users should not already exist.
	$Username = Puff_Member_Sanitize_Username($Username);
	$MemberExists = Puff_Member_Exists($Connection, $Username, false);
	if ( $MemberExists ) {
		$Msg = 'Sorry, that username is not available.';
		$Msg .= ' Please choose a different username, or login if this is your username.';
		return array('error' => $Msg);
	}

	////	Insert into Database
	$Result['Member'] = mysqli_query($Connection, 'INSERT INTO `Members` (`Username`) VALUES (\''.$Username.'\');');
	if ( !empty($Password) ) {
		$Result['Password'] = Puff_Member_Password_Set(
			$Connection,
			$Username,
			$Password
		);
	}
	return $Result;
}

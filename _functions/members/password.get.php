<?php

////	Get a new Password for an existing Member
function Puff_Member_Password_Get($Connection, $Username) {
	global $Sitewide, $Time;

	////	Check Member Existence
	$Username = Puff_Member_Sanitize_Username($Username);
	$MemberExists = Puff_Member_Exists($Connection, $Username);
	if ( !$MemberExists ) {
		return array('error' => 'Sorry, we can\'t change the password for a member that doesn\'t exist.');
	}

	////	Get the latest password into Database
	$Get = 'SELECT * FROM `Passwords` WHERE';
	$Get .= '`Username` =\''.$Username.'\' ';
	$Get .= 'ORDER BY `Created` DESC;';
	$Get = mysqli_fetch_once($Connection, $Get);

	return $Get;
}

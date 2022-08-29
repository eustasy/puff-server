<?php

function Puff_Member_Enable($Connection, $Username) {

	////	Check Member Existence
	$Username = Puff_Member_Sanitize_Username($Username);
	$MemberExists = Puff_Member_Exists($Connection, $Username, false);
	if ( !$MemberExists ) {
		return array('warning' => 'Sorry, that user does not exist.');
	}

	////	Disable existing Sessions
	Puff_Member_Session_Disable_All($Connection, $Username);

	////	Enable the User
	$Result = mysqli_query($Connection, 'UPDATE `Members` SET `Active`=\'1\' WHERE `Username`=\''.$Username.'\';');
	return $Result;

}

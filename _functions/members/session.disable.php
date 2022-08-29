<?php

function Puff_Member_Session_Disable($Connection, $Session) {

	$Session = htmlentities($Session, ENT_QUOTES, 'UTF-8');
	$SessionExists = Puff_Member_Session_Exists($Connection, $Session);
	if ( !$SessionExists ) {
		return array('warning' => 'Sorry, that session does not exist. I guess that means it\'s sort of disabled already?');
	}

	////	Disable the Session
	$Result = mysqli_query($Connection, 'UPDATE `Sessions` SET `Active`=\'0\' WHERE `Session`=\''.$Session.'\';');
	return $Result;

}

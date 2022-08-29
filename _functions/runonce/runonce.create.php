<?php

function Puff_Runonce_Create($Connection, $Session = false) {

	////	Check Session Existence
	if ( $Session ) {
		$Session = htmlentities($Session, ENT_QUOTES, 'UTF-8');
		$SessionExists = Puff_Member_Session_Exists($Connection, $Session);
		if ( !$SessionExists ) {
			// Let's just silently agree if the session doesn't exist.
			$Session = false;
		}
	} else {
		// We won't set a session if it's not checkable.
		$Session = false;
	}

	////	Generate a Runonce
	// The Runonce will be a 128 character hexidecimal hash from a secure source.
	// Will return an error if no secure source is available.
	$Runonce = Puff_SecureRandom();
	if ( !$Runonce ) {
		return array('error' => 'Error: No secure source was available for Runonce generation. This is not your fault.');
	}

	////	Insert into Database
	$Result = mysqli_query($Connection, 'INSERT INTO `Runonces` (`Runonce`, `Session`) VALUES (\''.$Runonce.'\', \''.$Session.'\');');
	$Return['Result'] = $Result;
	$Return['Runonce'] = $Runonce;
	return $Return;

}

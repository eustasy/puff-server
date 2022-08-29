<?php

function Puff_Member_Key_Create($Connection, $Username, $Key, $Value) {

	$Username = Puff_Member_Sanitize_Username($Username);
	$Key      = htmlentities($Key, ENT_QUOTES, 'UTF-8');
	$OldValue = Puff_Member_Key_Value($Connection, $Username, $Key);
	if ( $OldValue ) {
		return array('error' => 'Sorry, that UserKeyValue combination already exists.');
	}

	$Result = mysqli_query($Connection, 'INSERT INTO `KeyValues`(`Username`, `Key`, `Value`) VALUES (\''.$Username.'\', \''.$Key.'\', \''.$Value.'\');');
	return $Result;

}

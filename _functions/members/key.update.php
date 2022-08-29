<?php

function Puff_Member_Key_Update($Connection, $Username, $Key, $Value) {

	$Username = Puff_Member_Sanitize_Username($Username);
	$Key      = htmlentities($Key, ENT_QUOTES, 'UTF-8');
	$Value    = htmlentities($Value, ENT_QUOTES, 'UTF-8');

	$Result = mysqli_query($Connection, 'REPLACE INTO `KeyValues` (`Username`, `Key`, `Value`) VALUES (\''.$Username.'\', \''.$Key.'\', \''.$Value.'\');');
	return $Result;

}

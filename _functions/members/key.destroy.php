<?php

function Puff_Member_Key_Destroy($Connection, $Username, $Key) {

	$Username = Puff_Member_Sanitize_Username($Username);
	$Key      = htmlentities($Key, ENT_QUOTES, 'UTF-8');

	$OldValue = Puff_Member_Key_Value($Connection, $Username, $Key);
	if ( !$OldValue ) {
		return array('error' => 'Sorry, that UserKeyValue combination doesn\'t exist.');
	}

	////	Destroy the User
	$Result = mysqli_query($Connection, 'DELETE FROM `KeyValues` WHERE `Username`=\''.$Username.'\' AND `Key`=\''.$Key.'\';');
	return $Result;

}

<?php

function Puff_Member_Key_Value($Connection, $Username, $Key) {
	$Username = Puff_Member_Sanitize_Username($Username);
	$Key = htmlentities($Key, ENT_QUOTES, 'UTF-8');
	$Result = mysqli_fetch_once($Connection, 'SELECT `Value` FROM `KeyValues` WHERE `Username`=\''.$Username.'\' AND `Key`=\''.$Key.'\';');
	return $Result['Value'];
}

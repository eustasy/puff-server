<?php

function Puff_Runonce_Disable($Connection, $Runonce) {
	$Runonce = htmlentities($Runonce, ENT_QUOTES, 'UTF-8');
	$RunonceExists = Puff_Runonce_Exists($Connection, $Runonce);
	if ( !$RunonceExists ) {
		return array('warning' => 'Sorry, that Runonce does not exist. This is probably the result of too much clicking.');
	}
	////	Disable the Session
	$Result = mysqli_query($Connection, 'UPDATE `Runonces` SET `Active`=\'0\' WHERE `Runonce`=\''.$Runonce.'\';');
	return $Result;
}

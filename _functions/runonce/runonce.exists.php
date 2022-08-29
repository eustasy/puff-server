<?php

function Puff_Runonce_Exists($Connection, $Runonce, $Active = true) {

	$SQL = 'SELECT * FROM `Runonces` WHERE `Runonce`=\''.$Runonce.'\'';
	if ( $Active ) {
		$SQL .= ' AND `Active`=\'1\'';
	}
	$SQL .= ';';

	$Result = mysqli_fetch_count($Connection, $SQL);
	if ( $Result ) {
		return true;
	}

	return false;

}

<?php

function Puff_Member_Session_Disable_All($Connection, $Username, $Exemption = false) {

	$Username = Puff_Member_Sanitize_Username($Username);
	$SQL = 'UPDATE `Sessions` SET `Active`=\'0\' WHERE `Username`=\''.$Username.'\'';
	if ( $Exemption ) {
		$SQL .= ' AND NOT `Session`=\''.$Exemption.'\'';
	}
	$SQL .= ';';
	$Result = mysqli_query($Connection, $SQL);
	return $Result;

}

<?php

function Puff_Member_Session_Exists($Connection, $Session, $Active = true, $IPCheck = false) {

	$Session = htmlentities($Session, ENT_QUOTES);
	$SQL = 'SELECT * FROM `Sessions` WHERE `Session`=\''.$Session.'\'';

	if ( $Active ) {
		$SQL .= ' AND `Active`=\'1\'';
	}

	if ( $IPCheck ) {
		////	Figure out IP
		$CurrentIP = Puff_Member_Session_IP();
		if ( $CurrentIP ) {
			// TODO This half check is rather arbitrary.
			$IPPart = str_split($CurrentIP, round(strlen($CurrentIP)/2))[0];
			$SQL .= ' AND `IP` LIKE \''.$IPPart.'%\'';
		}
	}

	$SQL .= ';';
	$SessionExists = mysqli_fetch_once($Connection, $SQL);
	return $SessionExists;

}

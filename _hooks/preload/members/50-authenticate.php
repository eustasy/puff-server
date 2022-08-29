<?php

////	IF there is already a session.
if ( !empty($_COOKIE['session']) ) {
	$Session = Puff_Member_Session_Exists($Sitewide['Database']['Connection'], $_COOKIE['session']);
	if ( $Session ) {
		$Sitewide['Authenticated'] = $Session;
	} else {
		unset($_COOKIE['session']);
	}
}

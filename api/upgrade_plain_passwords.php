<?php

require_once __DIR__.'/../_puff/sitewide.php';
$Connection = $Sitewide['Database']['Connection'];

////	Get a list of every PLAIN password
$PlainPasswords = 'SELECT * FROM `Passwords` ';
$PlainPasswords .= 'WHERE `Method` =\'PLAIN\' ';
$PlainPasswords .= 'ORDER BY `Created` DESC;';
$PlainPasswords = mysqli_query($Connection, $PlainPasswords);

////	Upgrade every password
while ( $Password = mysqli_fetch_assoc($PlainPasswords) ) {
	echo 'Upgrading password for "'.$Password['Username'].'" created at "'.
		date("Y-m-d\TH:i:s\Z", $Password['Created']).'"'.PHP_EOL;
	$Set = Puff_Member_Password_Set($Connection, $Password['Username'], $Password['Hash']);

	if ( !empty($Set['error']) ) {
		echo $Set['error'].PHP_EOL;
	}

	if ( !empty($Set['New']) ) {
		echo 'Password upgraded successfully.'.PHP_EOL;
	} else {
		echo 'Password could not be upgraded.'.PHP_EOL;
	}

	if ( !empty($Set['CleanUp']) ) {
		echo 'Password cleanup successful.'.PHP_EOL;
	} else {
		echo 'Passwords could not be cleaned up.'.PHP_EOL;
	}

	echo PHP_EOL;
}

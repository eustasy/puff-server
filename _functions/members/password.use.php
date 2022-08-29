<?php

////	Modify the `Last used` time on a given password
function Puff_Member_Password_Use($Connection, $Username, $Hash) {
	global $Sitewide, $Time;

	$Update = 'UPDATE `Passwords` SET `Last used`=\''.$Time.'\' WHERE ';
	$Update .= '`Username`=\''.$Username.'\' AND `Hash` = \''.$Hash.'\';';
	$Update = mysqli_query($Connection, $Update);

	return $Update;
}

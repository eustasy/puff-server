<?php

// Honor the IE do-not-track-header,
// even though it's set automatically.
$respectIE = true;
// Set the DNT variables.
if (
	$Sitewide['Settings']['Honor DNT Headers'] &&
	is_readable($Sitewide['Puff']['Libs'].'here-miss.php')
) {
	require_once $Sitewide['Puff']['Libs'].'here-miss.php';
	$Sitewide['Here Miss']['trackme'] = $trackme;
} else {
	$Sitewide['Here Miss']['trackme'] = true;
}

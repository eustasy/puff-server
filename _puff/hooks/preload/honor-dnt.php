<?php

// Honor the IE do-not-track-header,
// even though it's set automatically.
$respectIE = true;
// Set the DNT variables.
if (
	$Sitewide['Settings']['Honor DNT Headers'] &&
	is_readable($Sitewide['Libs'].'here-miss.php')
) {
	$Sitewide['Libs'].'here-miss.php';
} else {
	$Sitewide['Here Miss']['trackme'] = true;
}

<?php

	// TODO Set ALL the parameters

	$Page['Title'] = 'Puff Sys';
	$Page['Type']  = 'Article';
	$Page['Published'] = '2015-02-05';
	require_once __DIR__.'/_puff/sitewide.php';
	require_once $Sitewide['Templates']['Header'];
?>

<h1>Welcome to Puff.</h1>

<?php
	require_once $Sitewide['Templates']['Footer'];

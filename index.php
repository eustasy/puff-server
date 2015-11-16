<?php
	require_once __DIR__.'/_puff/sitewide.php';
	$Page['Type']  = 'Index';
	$Page['Title'] = 'Puff Sys';
	$Page['Description'] = 'Puff is Awesome';
	require_once $Sitewide['Templates']['Header'];
?>

<h1>Welcome to Puff.</h1>

<?php
	require_once $Sitewide['Templates']['Footer'];

<?php
	require_once __DIR__.'/_puff/sitewide.php';
	$Page['Type']        = 'Index';
	$Page['Title']       = 'Puff Sys';
	$Page['Description'] = 'Puff is Awesome';

	$Page['JS'][] = 'http://anothercdn.example.com/js/basic.js';
	$Page['JS']['http://anothercdn.example.com/js/keyed.js'] = false;
	$Page['JS']['http://anothercdn.example.com/js/async.js'] = ['async' => true];
	$Page['JS']['internal.js'] = ['internal' => true];
	$Page['JS']['http://anothercdn.example.com/js/library.js'] = ['library' => true];

	$Page['CSS'][] = 'http://anothercdn.example.com/css/style.css';

	require_once $Sitewide['Templates']['Header'];
?>

<h1>Welcome to Puff.</h1>

<?php
	require_once $Sitewide['Templates']['Footer'];

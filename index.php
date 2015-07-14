<?php
	require_once __DIR__.'/_puff/sitewide.php';

error_reporting(E_ALL);
error_reporting(-1);
ini_set('error_reporting', E_ALL);

	// TODO Set ALL the parameters
	$Page['Title'] = 'Puff Sys';
	$Page['Tagline'] = 'Puff is Awesome';
	$Page['Type']  = 'Article';
	$Page['Published'] = '2015-02-05';
	// $Page['CSS'][] = $Sitewide['Assets']['External']['CSS'].'totallyacssfile.css';
	// $Page['JS'][] = $Sitewide['Assets']['External']['JS'].'jquery-old.js';

	require_once $Sitewide['Templates']['Header'];
?>

<h1>Welcome to Puff.</h1>
<a href="relative-link">Relative Link</a>
<a href="/puff-core/absolute-link">Absolute Link</a>
<a href="//local.localtest.me/puff-core/protocol-relative-link">Protocol-Relative Link</a>
<a href="http://local.localtest.me/puff-core/http-link">HTTP Link</a>
<a href="https://local.localtest.me/puff-core/https-link">HTTPS Link</a>
<a href="//external.localtest.me/puff-core/protocol-relative-link">External Protocol-Relative Link</a>
<a href="http://external.localtest.me/puff-core/http-link">External HTTP Link</a>
<a href="https://external.localtest.me/puff-core/https-link">External HTTPS Link</a>

<?php
	require_once $Sitewide['Templates']['Footer'];

<?php
	require_once __DIR__.'/_puff/sitewide.php';
	$Page['Type']  = 'Page';
	$Page['Title'] = 'Link Test';
	$Page['Description'] = 'A testing page for links';
	require_once $Sitewide['Templates']['Header'];
?>

<h1>Link Test</h1>
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

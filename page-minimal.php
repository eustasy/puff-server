<?php
	require_once __DIR__.'/_puff/sitewide.php';
	$Page['Type']        = 'Page';
	$Page['Title']       = 'Minimal Page';
	$Page['Description'] = 'This is a minimal page.';
	require_once $Sitewide['Templates']['Header'];
?>

<h1>This is a minimal page.</h1>
<p>It has a type of page, a title, and a nice description.</p>
<h2>That's it.</h2>

<?php
	require_once $Sitewide['Templates']['Footer'];

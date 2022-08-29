<?php
	require_once __DIR__.'/_puff/sitewide.php';
	$Page['Title'] = 'Hello World';
	$Page['Description']  = 'Totally a blog post.';
	$Page['Tagline']  = 'Totally a blog post.';
	$Page['Type']  = 'Blog Post';
	$Page['Published'] = '2015-10-09';
	require_once $Sitewide['Templates']['Header'];
?>

<h1>Hello World</h1>

<?php
	require_once $Sitewide['Templates']['Footer'];

<!DocType html>
<head>
<meta charset="UTF-8">
<!-- Viewport for Mobile Devices -->
<meta name="viewport"                   content="width=device-width, initial-scale=1.0">
<?php
	require __DIR__.'/meta.php';
	require __DIR__.'/css.php';
	require __DIR__.'/js.php';
	require __DIR__.'/schema.php';
	puff_hook('head');
?>
</head>
<body class="page-<?php echo $Sitewide['Request']['AutoLink']; ?>">
<?php
	puff_hook('header');
	puff_hook('navigation');
	puff_hook('pre-content');

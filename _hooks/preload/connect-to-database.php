<?php

////	Database Connection

if (version_compare(PHP_VERSION, '5.3.0', '>=')) {
	$Sitewide['Settings']['DB']['Hostname'] = 'p:'.$Sitewide['Settings']['DB']['Hostname'];
}

$Sitewide['Database']['Connection'] = mysqli_connect(
	$Sitewide['Settings']['DB']['Hostname'],
	$Sitewide['Settings']['DB']['Username'],
	$Sitewide['Settings']['DB']['Password'],
	$Sitewide['Settings']['DB']['Default Table']
);

$Sitewide['Settings']['DB']['Hostname'] = true;
$Sitewide['Settings']['DB']['Username'] = true;
$Sitewide['Settings']['DB']['Password'] = true;

if ( !$Sitewide['Database']['Connection'] ) {
	if ( $Sitewide['Settings']['DB']['Fatal on Error'] ) {
		?><!DocType html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Puff: Fatal Error</title>
	</head>
	<body>
		<h1 id="puff--fatal-error">Puff: Fatal Error</h1>
		<p>Puff has encountered a fatal error while connecting and cannot continue.</p>
		<h3 id="puff--connection-error--details">Connection Error: &quot;<?php echo mysqli_connect_error($Sitewide['Database']['Connection']); ?>&quot;</h3>
	</body>
</html><?php
		exit;

	} else {
		$Sitewide['Database']['Error'] = mysqli_connect_error($Sitewide['Database']['Connection']);
	}
} else {
	$Sitewide['Database']['Error'] = false;
}

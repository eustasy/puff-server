<?php
	require_once __DIR__.'/_puff/sitewide.php';

	foreach (glob_recursive($Sitewide['Root'].'*.php', 0, true) as $File) {
		echo $File.'<br>';
	}

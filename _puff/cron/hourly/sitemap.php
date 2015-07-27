<?php
	require_once __DIR__.'/../../sitewide.php';
	foreach (glob_recursive($Sitewide['Root'].'/*.php', 0, true) as $File) {
		echo $File."\n";
	}

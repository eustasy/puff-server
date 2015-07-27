<?php
	require_once __DIR__.'/../sitewide.php';
	require_all_once($Sitewide['Puff']['Cron'].'hourly/');

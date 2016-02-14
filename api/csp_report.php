<?php

require_once __DIR__.'/../_puff/sitewide.php';

$data = file_get_contents('php://input');
$incursion = json_decode($data, true);
$pretty = json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);

if ( $incursion['csp-report'] ) {
	if ( $Sitewide['Database']['Connection'] ) {
		mysqli_query($Sitewide['Database']['Connection'], 'INSERT INTO `CSP Violations` (`Date`, `document-uri`, `referrer`, `blocked-uri`, `violated-directive`, `original-policy`) VALUES (\''.$Date.'\', \''.$incursion['csp-report']['document-uri'].'\', \''.$incursion['csp-report']['referrer'].'\', \''.$incursion['csp-report']['blocked-uri'].'\', \''.$incursion['csp-report']['violated-directive'].'\', \''.$incursion['csp-report']['original-policy'].'\');');

	} else if ( is_writable($Sitewide['Puff']['Root'].'csp_report.log') ) {
		$CSP_Text = 'CSP Violation at '.$Date.' :'.PHP_EOL.$pretty.PHP_EOL;
		file_put_contents($Sitewide['Puff']['Root'].'csp_report.log', $CSP_Text, FILE_APPEND | LOCK_EX);

	} else {
		echo 'Error: '.$Sitewide['Puff']['Root'].'csp_report.log is not writeable.'.PHP_EOL;
		exit(1);
	}
}

header($_SERVER['SERVER_PROTOCOL'].' 204 No Content');

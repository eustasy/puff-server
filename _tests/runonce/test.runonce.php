<?php
require_once __DIR__.'/../../_puff/sitewide.php';
$Page['Type']  = 'Test';

$Connection = $Sitewide['Database']['Connection'];
$Username = '__AUTOTESTING_RUNONCE_1__';

echo 'Puff_Runonce_Create'.PHP_EOL;
$Result['Create'] = Puff_Runonce_Create($Connection);
var_dump($Result['Create']); // array
$Runonce = $Result['Create']['Runonce'];
echo 'Runonce is'.PHP_EOL;
var_dump($Runonce); // string
echo 'Puff_Runonce_Exists'.PHP_EOL;
$Result['Exists'] = Puff_Runonce_Exists($Connection, $Runonce);
var_dump($Result['Exists']); // true
echo 'Puff_Runonce_Disable'.PHP_EOL;
$Result['Disable'] = Puff_Runonce_Disable($Connection, $Runonce);
var_dump($Result['Disable']); // true
echo 'Puff_Runonce_Exists'.PHP_EOL;
$Result['Exists2'] = Puff_Runonce_Exists($Connection, $Runonce);
var_dump($Result['Exists2']); // false
$Result['Exists2'] = !$Result['Exists2'];
echo 'Puff_Runonce_Exists (not active)'.PHP_EOL;
$Result['Exists3'] = Puff_Runonce_Exists($Connection, $Runonce, false);
var_dump($Result['Exists3']); // true

if ( in_array(false, $Result, true) ) {
	exit(1);
}

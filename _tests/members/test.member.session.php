<?php
require_once __DIR__.'/../../_puff/sitewide.php';
$Page['Type']  = 'Test';

$Connection = $Sitewide['Database']['Connection'];
$Username = '__AUTOTESTING_MEMBER_SESSION__';

echo 'Puff_Member_Create'.PHP_EOL;
$Result['Member'] = Puff_Member_Create($Connection, $Username, 'Password1');
var_dump($Result['Member']);

echo 'Puff_Member_Session_Create'.PHP_EOL;
$Result['Create'] = Puff_Member_Session_Create($Connection, $Username);
var_dump($Result['Create']);

echo 'Puff_Member_Session_Exists'.PHP_EOL;
$Result['Exists'] = Puff_Member_Session_Exists($Connection, $Result['Create']['Session']);
var_dump($Result['Exists']);

echo 'Puff_Member_Session_Disable'.PHP_EOL;
$Result['Disable'] = Puff_Member_Session_Disable($Connection, $Result['Create']['Session']);
var_dump($Result['Disable']);

echo 'Puff_Member_Session_Exists'.PHP_EOL;
$Result['Exists2'] = Puff_Member_Session_Exists($Connection, $Result['Create']['Session']);
var_dump($Result['Exists2']);
$Result['Exists2'] = !$Result['Exists2'];

echo 'Puff_Member_Session_Create'.PHP_EOL;
$Result['Create2'] = Puff_Member_Session_Create($Connection, $Username);
var_dump($Result['Create2']);

echo 'Puff_Member_Session_Exists'.PHP_EOL;
$Result['Exists3'] = Puff_Member_Session_Exists($Connection, $Result['Create2']['Session']);
var_dump($Result['Exists3']);

echo 'Puff_Member_Session_Create'.PHP_EOL;
$Result['Create3'] = Puff_Member_Session_Create($Connection, $Username);
var_dump($Result['Create3']);

echo 'Puff_Member_Session_Disable_All'.PHP_EOL;
$Result['DisableAll'] = Puff_Member_Session_Disable_All($Connection, $Username);
var_dump($Result['DisableAll']);

echo 'Puff_Member_Session_Exists'.PHP_EOL;
$Result['Exists4'] = Puff_Member_Session_Exists($Connection, $Result['Create2']['Session']);
var_dump($Result['Exists4']);
$Result['Exists4'] = !$Result['Exists4'];

echo 'Puff_Member_Destroy'.PHP_EOL;
$Result['Destroy'] = Puff_Member_Destroy($Connection, $Username);
var_dump($Result['Destroy']);

if ( in_array(false, $Result, true) ) {
	exit(1);
}

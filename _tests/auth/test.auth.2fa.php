<?php
require_once __DIR__.'/../../_puff/sitewide.php';
$Page['Type']  = 'Test';

$Connection = $Sitewide['Database']['Connection'];
$Username = '__AUTOTESTING_MEMBER_2FA__';
$CurrentSession = false;

echo 'Puff_Member_Create'.PHP_EOL;
$Result['Member'] = Puff_Member_Create($Connection, $Username, 'Password1');
var_dump($Result['Member']);

echo 'Puff_Member_2FA_Create'.PHP_EOL;
$Result['Create'] = Puff_Member_2FA_Create($Connection, $Username);
var_dump($Result['Create']);

$Secret = explode('?secret=', $Result['Create']['URL']);
$Secret = explode('&', $Secret[1]);
$Secret = $Secret[0];

require_once $Sitewide['Puff']['Libs'].'authenticatron.php';
$Code = Authenticatron_Code($Secret);

echo 'Puff_Member_2FA_Enable'.PHP_EOL;
$Result['Enable'] = Puff_Member_2FA_Enable($Connection, $Username, $Code, $CurrentSession);
var_dump($Result['Enable']);

echo 'Puff_Member_2FA_Disable'.PHP_EOL;
$Result['Disable']= Puff_Member_2FA_Disable($Connection, $Username, $Code);
var_dump($Result['Disable']);

echo 'Puff_Member_Destroy'.PHP_EOL;
$Result['Destroy'] = Puff_Member_Destroy($Connection, $Username);
var_dump($Result['Destroy']);

if ( in_array(false, $Result, true) ) {
	exit(1);
}

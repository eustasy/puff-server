<?php
require_once __DIR__.'/../../_puff/sitewide.php';
$Page['Type']  = 'Test';

$Connection = $Sitewide['Database']['Connection'];
$Username = '__AUTOTESTING_MEMBER_KEY__';
$Key = 'FavColor';
$Value = 'Blue';

echo 'Puff_Member_Key_Create'.PHP_EOL;
$Result['Create'] = Puff_Member_Key_Create($Connection, $Username, $Key, $Value);
var_dump($Result['Create']); // true

echo 'Puff_Member_Key_Value'.PHP_EOL;
$Result['Value'] = Puff_Member_Key_Value($Connection, $Username, $Key);
var_dump($Result['Value']); // string

echo 'Puff_Member_Key_Update'.PHP_EOL;
$Value = 'Red';
$Result['Update'] = Puff_Member_Key_Update($Connection, $Username, $Key, $Value);
var_dump($Result['Update']); // true

echo 'Puff_Member_Key_Like'.PHP_EOL;
$Result['Like'] = Puff_Member_Key_Like($Connection, $Username, $Key);
var_dump($Result['Like']); // mysqli_object

echo 'Puff_Member_Key_Destroy'.PHP_EOL;
$Result['Destroy'] = Puff_Member_Key_Destroy($Connection, $Username, $Key);
var_dump($Result['Destroy']); // true

echo 'Puff_Member_Key_Value'.PHP_EOL;
$Result['Value2'] = Puff_Member_Key_Value($Connection, $Username, $Key);
var_dump($Result['Value2']); // NULL
$Result['Value2'] = !$Result['Value2'];

if ( in_array(false, $Result, true) ) {
	exit(1);
}

<?php

function puff_hook($Hook) {
	global $Sitewide;
	require_all_once($Sitewide['Puff']['Hooks'].$Hook.'/');
}

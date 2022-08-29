<?php

function Puff_Member_Sanitize_Username($Username) {
	$Username = strtolower($Username);
	$Username = htmlentities($Username, ENT_QUOTES, 'UTF-8');
	return $Username;
}

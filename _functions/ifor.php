<?php

function ifOr($One, $Two, $Reference) {
	return !empty($One[$Reference]) ? $One[$Reference] : $Two[$Reference];
}

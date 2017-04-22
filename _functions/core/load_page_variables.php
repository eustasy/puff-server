<?php

function load_page_variables($Sitewide, $File, $Date_Format) {

	$Page['Type']      = false;
	$Page['Title']     = false;
	$Page['Tagline']   = false;
	$Page['Author']    = false;
	$Page['Published'] = false;

	$URL = str_replace($Sitewide['Root'], '', $File);
	$URL = str_replace('index.php', '', $URL);
	if ( $Sitewide['Settings']['Strip PHP from URLs'] ) {
		require_once $Sitewide['Puff']['Functions'].'core/ends_with.php';
		if ( ends_with($URL, '.php') ) {
			$URL = substr($URL, 0, -4);
		}
	}
	$Page['Link'] = $Sitewide['Settings']['Site Root'].$URL;

	$Lines = file($File);
	foreach ($Lines as $Line) {
		if (strpos($Line, '$Page[\'Type\']') !== false) {
			$Line = explode('\'', $Line);
			$Page['Type'] = $Line[count($Line)-2];
		} else if (strpos($Line, '$Page[\'Title\']') !== false) {
			$Line = explode('\'', $Line);
			$Page['Title'] = $Line[count($Line)-2];
		} else if (strpos($Line, '$Page[\'Tagline\']') !== false) {
			$Line = explode('\'', $Line);
			$Page['Tagline'] = $Line[count($Line)-2];
		} else if (strpos($Line, '$Page[\'Author\']') !== false) {
			$Line = explode('\'', $Line);
			$Page['Author'] = $Line[count($Line)-2];
		} else if (strpos($Line, '$Page[\'Published\']') !== false) {
			$Line = explode('\'', $Line);
			$Page['Published'] = $Line[count($Line)-2];
		}
	}

	if ( $Page['Published'] ) {
		$Page['Published'] = date($Date_Format, strtotime($Page['Published']));
	} else {
		$Page['Published'] = date($Date_Format, filemtime($File));
	}

	return $Page;

}

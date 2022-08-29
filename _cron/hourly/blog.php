<?php

if ( is_writable($Sitewide['Root'].'blog.json') ) {
	// For each file
	foreach (glob_recursive($Sitewide['Root'].'*.php', 0, true) as $File) {
		// Get page variables.
		require_once $Sitewide['Puff']['Functions'].'core/load_page_variables.php';
		$Page = load_page_variables($Sitewide, $File, 'Y-m-d\TH:i:sP');
		if ( !$Page['Title'] ) {
			$Page['Title'] = $Sitewide['Page']['Title'];
		}
		if ( !$Page['Tagline'] ) {
			$Page['Tagline'] = $Sitewide['Page']['Tagline'];
		}
		if ( !$Page['Author'] ) {
			$Page['Author'] = $Sitewide['Page']['Author'];
		}
		// Add to list if allowed.
		if ( in_array($Page['Type'], array('Article', 'Blog', 'Blog Post', 'BlogPost', 'Post')) ) {
			$Blog[$Page['Published'].' '.urlencode($Page['Link'])] = $Page;
		}
	}

	krsort($Blog);
	// var_dump($Blog);
	$Blog = json_encode($Blog, JSON_PRETTY_PRINT);

	$Result = file_put_contents($Sitewide['Root'].'blog.json', $Blog);
	if ( $Result ) {
		echo 'Success: Generation and Write of Blog successful.'.PHP_EOL;
	} else {
		echo 'Error: Blog could not be written, but we thought it was writable.'.PHP_EOL;
	}
} else {
	echo 'Error: '.$Sitewide['Root'].'blog.json is not writeable.'.PHP_EOL;
}

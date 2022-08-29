<?php

if ( is_writable($Sitewide['Root'].'feed.xml') ) {
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
			$Posts[$Page['Published'].' '.urlencode($Page['Link'])] = $Page;
		}
	}

	krsort($Posts);
	$Posts = array_slice($Posts, 0, 25);

	$Feed = '<?xml version="1.0" encoding="UTF-8"?>
	<rss version="2.0" xmlns:atom="https://www.w3.org/2005/Atom" xmlns:dc="http://purl.org/dc/elements/1.1/">
	<channel>
		<title>'.$Sitewide['Settings']['Site Title'].'</title>
		<link>'.$Sitewide['Settings']['Site Root'].'</link>
		<atom:link href="'.$Sitewide['Settings']['Site Root'].'feed.xml" rel="self" type="application/rss+xml" />
		<description>'.$Sitewide['Settings']['Alternative Site Title'].'</description>
		<language>en-us</language>';

	foreach ($Posts as $Post) {
		$Feed .= '
		<item>
			<title>'.$Post['Title'].'</title>
			<link>'.$Post['Link'].'</link>
			<guid isPermaLink="true">'.$Post['Link'].'</guid>
			<description>'.$Post['Tagline'].'</description>
			<dc:creator>'.$Post['Author'].'</dc:creator>
			<dc:date>'.$Post['Published'].'</dc:date>
			<pubDate>'.date('D, d M Y H:i:s O', strtotime($Post['Published'])).'</pubDate>
		</item>';
	}

	$Feed .= '
	</channel>
</rss>';

	// var_dump($Feed);

	$Result = file_put_contents($Sitewide['Root'].'feed.xml', $Feed);
	if ( $Result ) {
		echo 'Success: Generation and Write of Feed successful.'.PHP_EOL;
	} else {
		echo 'Error: Feed could not be written, but we thought it was writable.'.PHP_EOL;
	}
} else {
	echo 'Error: '.$Sitewide['Root'].'feed.xml is not writeable.'.PHP_EOL;
}

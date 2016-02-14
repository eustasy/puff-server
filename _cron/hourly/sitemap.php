<?php

if ( is_writable($Sitewide['Root'].'sitemap.xml') ) {
	// For each PHP File
	foreach (glob_recursive($Sitewide['Root'].'*.php', 0, true) as $File) {
		// Get page variables.
		require_once $Sitewide['Puff']['Functions'].'load_page_variables.php';
		$Page = load_page_variables($Sitewide, $File, 'Y-m-d');
		// Add to list if allowed.
		if (
			$Page['Type'] &&
			!in_array($Page['Type'], array('API', 'Backend', 'Hidden', 'Private'))
		) {
			$Pages[$Page['Published'].' '.urlencode($Page['Link'])] = $Page;
		}
	}

	$Sitemap = '<?xml version="1.0" encoding="utf-8"?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';
	foreach ( $Pages as $Item ) {
		// TODO Responsive Priority and ChangeFreq
		$Sitemap .= '
	<url>
		<loc>'.$Item['Link'].'</loc>
		<lastmod>'.$Item['Published'].'</lastmod>
		<priority>1</priority>
		<changefreq>daily</changefreq>
	</url>';
	}
	$Sitemap .= '
</urlset>';

	$Result = file_put_contents($Sitewide['Root'].'sitemap.xml', $Sitemap);
	if ( $Result ) {
		echo 'Success: Generation and Write of Sitemap successful.'."\n";
	} else {
		echo 'Error: Sitemap could not be written, but we thought it was writable.'."\n";
	}

} else {
	echo 'Error: '.$Sitewide['Root'].'sitemap.xml not writeable.'."\n";
}

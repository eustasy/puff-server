<?php

// For each PHP File
foreach (glob_recursive($Sitewide['Root'].'*.php', 0, true) as $File) {
	// Get page variables.
	require_once $Sitewide['Puff']['Functions'].'core/load_page_variables.php';
	$Page = load_page_variables($Sitewide, $File, 'Y-m-d');
	// Add to list if allowed.
	if (
		$Page['Type'] &&
		!in_array($Page['Type'], array('API', 'Backend', 'Hidden', 'Private'))
	) {
		$Pages[$Page['Published'].' '.urlencode($Page['Link'])] = $Page;
	}
}

if ( count($Pages) > $Sitewide['Sitemap']['Pagination'] ) {
	$SitemapCount = 1;
	while ( $SitemapCount <= ceil( count($Pages) / $Sitewide['Sitemap']['Pagination'] ) ) {
		$SitemapPages = array_slice($Pages, ( $SitemapCount - 1 ) * $Sitewide['Sitemap']['Pagination'], $SitemapCount * $Sitewide['Sitemap']['Pagination']);
		$Sitemap = Puff_Sitemap_Make($SitemapPages);
		$Result = file_put_contents($Sitewide['Root'].'sitemap_'.$SitemapCount.'.xml', $Sitemap);
		if ( $Result ) {
			echo 'Success: Generation and Write of Sitemap "'.$Sitewide['Root'].'sitemap_'.$SitemapCount.'.xml'.'" successful.'."\n";
		} else {
			echo 'Error: Sitemap "'.$Sitewide['Root'].'sitemap.xml'.'" could not be written.'."\n";
		}
		$SitemapCount++;
	}
	$Sitemap = Puff_Sitemap_Index($SitemapCount);
	$Result = file_put_contents($Sitewide['Root'].'sitemap.xml', $Sitemap);
	if ( $Result ) {
		echo 'Success: Generation and Write of Sitemap "'.$Sitewide['Root'].'sitemap.xml'.'" successful.'."\n";
	} else {
		echo 'Error: Sitemap "'.$Sitewide['Root'].'sitemap.xml'.'" could not be written.'."\n";
	}

} else {
	$Sitemap = Puff_Sitemap_Make($Pages);
	$Result = file_put_contents($Sitewide['Root'].'sitemap.xml', $Sitemap);
	if ( $Result ) {
		echo 'Success: Generation and Write of Sitemap "'.$Sitewide['Root'].'sitemap.xml'.'" successful.'."\n";
	} else {
		echo 'Error: Sitemap "'.$Sitewide['Root'].'sitemap.xml'.'" could not be written.'."\n";
	}
}

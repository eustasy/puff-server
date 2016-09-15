<?php

// TODO Variable should be in Config.
$SitemapPagination = 10;

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

// TODO Move to function file.
function Puff_Sitemap_Make($SitemapPages) {
	$Sitemap = '<?xml version="1.0" encoding="utf-8"?>'.PHP_EOL;
	$Sitemap .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">'.PHP_EOL;
	foreach ( $SitemapPages as $Item ) {
		// TODO Responsive Priority and ChangeFreq
		$Sitemap .= '	<url>'.PHP_EOL;
		$Sitemap .= '		<loc>'.$Item['Link'].'</loc>'.PHP_EOL;
		if (
			!empty($Item['Published']) &&
			$Item['Published'] != '1970-01-01'
		) {
			$Sitemap .= '		<lastmod>'.$Item['Published'].'</lastmod>'.PHP_EOL;
		}
		$Sitemap .= '		<priority>1</priority>'.PHP_EOL;
		$Sitemap .= '		<changefreq>daily</changefreq>'.PHP_EOL;
		$Sitemap .= '	</url>'.PHP_EOL;
	}
	$Sitemap .= '</urlset>'.PHP_EOL;
	return $Sitemap;
}

// TODO Move to function file.
function Puff_Sitemap_Index($SitemapCount) {
	global $Sitewide;
	$Sitemap = '<?xml version="1.0" encoding="utf-8"?>'.PHP_EOL;
	$Sitemap .= '<sitemapindex xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">'.PHP_EOL;
	for ($i = 1; $i < $SitemapCount; $i++) {
		$Sitemap .= '	<sitemap>'.PHP_EOL;
		$Sitemap .= '		<loc>'.$Sitewide['Settings']['Site Root'].'sitemap_'.$i.'.xml'.'</loc>'.PHP_EOL;
		$Sitemap .= '		<lastmod>'.date('c').'</lastmod>'.PHP_EOL;
		$Sitemap .= '	</sitemap>'.PHP_EOL;
	}
	$Sitemap .= '</sitemapindex>'.PHP_EOL;
	return $Sitemap;
}

if ( count($Pages) > $SitemapPagination ) {
	$SitemapCount = 1;
	while ( $SitemapCount <= ceil( count($Pages) / $SitemapPagination ) ) {
		$SitemapPages = array_slice($Pages, ( $SitemapCount - 1 ) * $SitemapPagination, $SitemapCount * $SitemapPagination);
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

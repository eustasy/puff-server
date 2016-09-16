<?php

function Sitemap_Make($SitemapPages) {
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
		$Priority = 1 - ( ( substr_count($Item['Link'], '/') - 3 ) / 10 );
		if ( $Priority < 0.1 ) {
			$Priortiy = 0.1;
		}
		$Sitemap .= '		<priority>'.$Priority.'</priority>'.PHP_EOL;
		$Sitemap .= '		<changefreq>daily</changefreq>'.PHP_EOL;
		$Sitemap .= '	</url>'.PHP_EOL;
	}
	$Sitemap .= '</urlset>'.PHP_EOL;
	return $Sitemap;
}

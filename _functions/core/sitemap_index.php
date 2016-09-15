<?php

function Sitemap_Index($SitemapCount) {
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

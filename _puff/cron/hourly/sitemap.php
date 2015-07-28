<?php

if ( is_writable($Sitewide['Root'].'sitemap.xml') ) {
	$Sitemap = '<?xml version="1.0" encoding="utf-8"?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';

	foreach (glob_recursive($Sitewide['Root'].'*.php', 0, true) as $File) {
		$Page['Type'] = false;
		$Lines = file($File);
		foreach ($Lines as $Line) {
			if (strpos($Line, '$Page[\'Type\']') !== false) {
				$Line = explode('\'', $Line);
				$Page['Type'] = $Line[count($Line)-2];
			}
		}
		if (
			$Page['Type'] &&
			!in_array($Page['Type'], array('API', 'Backend', 'Hidden'))
		) {
			$URL = str_replace($Sitewide['Root'], '', $File);
			$URL = str_replace('index.php', '', $URL);
			// TODO Responsive Priority and ChangeFreq
			$Sitemap .= '
	<url>
		<loc>'.$Sitewide['Settings']['Site Root'].$URL.'</loc>
		<lastmod>'.date('Y-m-d', filemtime($File)).'</lastmod>
		<priority>1</priority>
		<changefreq>daily</changefreq>
	</url>';
		}
	}

	$Sitemap .= '
</urlset>';

	// var_dump($Sitemap);

	$Result = file_put_contents($Sitewide['Root'].'sitemap.xml', $Sitemap);
	if ( $Result ) {
		echo 'Success: Generation and Write of Sitemap successful.'."\n";
	} else {
		echo 'Error: Sitemap could not be written, but we thought it was writable.'."\n";
	}

} else {
	echo 'Error: '.$Sitewide['Root'].'sitemap.xml not writeable.'."\n";
}

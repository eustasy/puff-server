<!DocType html>
<head>
<meta charset="UTF-8">
<!-- Viewport for Mobile Devices -->
<meta name="viewport"                   content="width=device-width, initial-scale=1.0">
<!-- Meta Info -->
<title><?php echo $Page['Title']; ?></title>
<meta name="description"                content="<?php echo $Page['Description']; ?>">
<meta name="author"                     content="<?php echo $Page['Author']; ?>">
<meta name="theme-color"                content="<?php echo $Page['Theme Color']; ?>">
<!-- Optimizations for Google -->
<meta itemprop="name"                   content="<?php echo $Page['Title']; ?>" />
<meta itemprop="description"            content="<?php echo $Page['Description']; ?>" />
<meta itemprop="image"                  content="<?php echo $Page['Image']; ?>" />
<!-- Optimizations for Facebook -->
<meta property="og:title"               content="<?php echo $Page['Title']; ?>" />
<meta property="og:description"         content="<?php echo $Page['Description']; ?>" />
<meta property="og:image"               content="<?php echo $Page['Image']; ?>" />
<!-- Optimizations for Twitter -->
<meta name="twitter:title"              content="<?php echo $Page['Title']; ?>">
<meta name="twitter:description"        content="<?php echo $Page['Description']; ?>">
<meta name="twitter:image"              content="<?php echo $Page['Image']; ?>" />
<meta name="twitter:site"               content="<?php echo $Page['Twitter Site']; ?>">
<meta name="twitter:creator"            content="<?php echo $Page['Twitter Author']; ?>">
<?php
	if ( !empty($Page['Image']) ) {
		echo '<meta name="twitter:card"               content="summary_large_image">';
	} else {
		echo '<meta name="twitter:card"               content="summary">';
	}
	echo "\n";
?>
<!-- iPinning -->
<meta name="apple-mobile-web-app-title" content="<?php echo $Sitewide['Settings']['Site Title']; ?>">
<!-- Android Pinning -->
<link rel="manifest"                    href="/assets/manifest.json">
<!-- Favicon -->
<link rel="shortcut icon"               href="/assets/icons/favicon.ico">
<link rel="apple-touch-icon"            href="/assets/icons/apple-touch-icon.png">
<link rel="icon" type="image/png"       href="/assets/icons/favicon.png" sizes="256x256">
<!-- Authorship -->
<link rel="author"                      href="<?php echo $Page['Google+ Author']; ?>" title="<?php echo $Page['Author Name']; ?>"/>
<!-- Stylesheets -->
<?php
	if (!empty($Page['CSS'])) {
		foreach ($Page['CSS'] as $Stylsheet) {
			echo '<link rel="stylesheet"                  href="'.$Stylsheet.'">'."\n";
		}
	}
?>
<!-- JavaScripts -->
<script><?php require_once $Sitewide['Assets']['Internal']['JS'].'jQl.min.js'; ?></script>
<script>jQl.loadjQ('<?php echo $Page['JQ']; ?>');</script>
<?php
	if (!empty($Page['JS'])) {
		foreach ( $Page['JS'] as $Key => $Value ) {
			if (
				is_array($Value) &&
				!empty($Value['internal'])
			) {
				echo '<script>'.PHP_EOL;
				include_once $Key;
				echo '</script>'.PHP_EOL;
			} else if (
				is_array($Value) &&
				!empty($Value['library'])
			) {
				echo '<script>jQl.loadjQdep(\''.$Key.'\');</script>'.PHP_EOL;
			} else if (
				is_array($Value) &&
				!empty($Value['async'])
			) {
				echo '<script src="'.$Key.'" async></script>'.PHP_EOL;
			} else if ( is_array($Value) || empty($Value) ) {
				echo '<script src="'.$Key.'"></script>'.PHP_EOL;
			} else if ( !is_array($Value) ) {
				echo '<script src="'.$Value.'"></script>'.PHP_EOL;
			}
		}
	}
	echo !empty($Page['Header']) ? $Page['Header'] : false;
	puff_hook('head');
	echo '<script>jQl.boot();</script>'.PHP_EOL;
?>
<!-- Website Logo Schema -->
<script type="application/ld+json">
{
	"@context"            : "http://schema.org/",
	"@type"               : "Organization",
	"url"                 : "<?php echo $Sitewide['Request']['Scheme'].'://'.$Sitewide['Request']['Host']; ?>",
	"logo"                : "<?php echo $Sitewide['Assets']['External']['Image']; ?>logo.png"
}
</script>
<!-- Website Name Schema -->
<script type="application/ld+json">
{
	"@context"            : "http://schema.org",
	"@type"               : "WebSite",
	"name"                : "<?php echo $Sitewide['Settings']['Site Title']; ?>",
	"alternateName"       : "<?php echo $Sitewide['Settings']['Alternative Site Title']; ?>",
	"url"                 : "<?php echo $Sitewide['Request']['Scheme'].'://'.$Sitewide['Request']['Host']; ?>"
}
</script>
<!-- Website Social Schema -->
<script type="application/ld+json">
<?php
echo '{
	"@context"            : "http://schema.org",
	"@type"               : "Organization",
	"name"                : "'.$Sitewide['Settings']['Site Title'].'",
	"url"                 : "'.$Sitewide['Request']['Scheme'].'://'.$Sitewide['Request']['Host'].'",
	"sameAs"              : [';
	$Socials = '';
	foreach ( $Sitewide['Social'] as $Social ) {
		$Socials .= "\n".'		"'.$Social.'",';
	}
	echo trim($Socials, ',');
echo '
	]
}
';
?>
</script>
<?php
if (
	!empty($Page['Type']) &&
	$Page['Type'] == 'Article'
) {
	echo '<!-- Article Schema -->
<script type="application/ld+json">
{
	"@context"            : "http://schema.org",
	"@type"               : "NewsArticle",
	"headline"            : "'.$Page['Title'].'",
	"alternativeHeadline" : "'.$Page['Tagline'].'",
	"datePublished"       : "'.$Page['Published'].'",
	"description"         : "'.$Page['Description'].'",
	"image"               : [';
	if ( !empty($Page['Images']) ) {
		$Images = '';
		foreach ( $Page['Images'] as $Image ) {
			$Images .= "\n".'		"'.$Image.'",';
		}
		echo trim($Images, ',');
	}
	echo '
	]
}
</script>
';
}
?>
</head>
<body class="page-<?php echo $Sitewide['Request']['AutoLink']; ?>">
<?php
	puff_hook('header');
	puff_hook('navigation');
	puff_hook('pre-content');

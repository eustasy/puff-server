<!DocType html>
<head>
<meta charset="UTF-8">
<!-- Viewport for Mobile Devices -->
<meta name="viewport"                   content="width=device-width, initial-scale=1.0">
<!-- Meta Info -->
<title><?php echo ifOr($Page, $Sitewide, 'Title'); ?></title>
<meta name="description"                content="<?php echo ifOr($Page, $Sitewide, 'Description'); ?>">
<meta name="author"                     content="<?php echo ifOr($Page, $Sitewide, 'Author'); ?>">
<meta name="theme-color"                content="<?php echo ifOr($Page, $Sitewide, 'Theme Color'); ?>">
<!-- Optimizations for Google -->
<meta itemprop="name"                   content="<?php echo ifOr($Page, $Sitewide, 'Title'); ?>" />
<meta itemprop="description"            content="<?php echo ifOr($Page, $Sitewide, 'Description'); ?>" />
<meta itemprop="image"                  content="<?php echo ifOr($Page, $Sitewide, 'Image'); ?>" />
<!-- Optimizations for Facebook -->
<meta property="og:title"               content="<?php echo ifOr($Page, $Sitewide, 'Title'); ?>" />
<meta property="og:description"         content="<?php echo ifOr($Page, $Sitewide, 'Description'); ?>" />
<meta property="og:image"               content="<?php echo ifOr($Page, $Sitewide, 'Image'); ?>" />
<!-- Optimizations for Twitter -->
<meta name="twitter:title"              content="<?php echo ifOr($Page, $Sitewide, 'Title'); ?>">
<meta name="twitter:description"        content="<?php echo ifOr($Page, $Sitewide, 'Description'); ?>">
<meta name="twitter:image"              content="<?php echo ifOr($Page, $Sitewide, 'Image'); ?>" />
<meta name="twitter:site"               content="<?php echo ifOr($Page, $Sitewide, 'Twitter Site'); ?>">
<meta name="twitter:creator"            content="<?php echo ifOr($Page, $Sitewide, 'Twitter Author'); ?>">
<?php
	if ( !empty($Page['Image']) ) {
		echo '<meta name="twitter:card"               content="summary_large_image">';
	} else {
		echo '<meta name="twitter:card"               content="summary">';
	}
	echo "\n";
?>
<!-- iPinning -->
<meta name="apple-mobile-web-app-title" content="elementary">
<!-- Android Pinning -->
<link rel="manifest"                    href="/assets/manifest.json">
<!-- Favicon -->
<link rel="shortcut icon"               href="/assets/icons/favicon.ico">
<link rel="apple-touch-icon"            href="/assets/icons/apple-touch-icon.png">
<link rel="icon" type="image/png"       href="/assets/icons/favicon.png" sizes="256x256">
<?php
	if (
		!empty($Page['Google+ Author']) &&
		!empty($Page['Author Name'])
	) {
		echo '<!-- Authorship -->'."\n";
		echo '<link rel="author"                      href="'.$Page['Google+ Author'].'" title="'.$Page['Author Name'].'"/>';
	}
?>
<!-- Stylesheets -->
<link rel="stylesheet"                  href="//cdn.jsdelivr.net/g/normalize,colors.css">
<link rel="stylesheet"                  href="/assets/css/main.css">
<?php
	// $Page['CSS'][] = '//cdn.jsdelivr.net/fontawesome/4.3.0/css/font-awesome.min.css';
	foreach ($Page['CSS'] as $Stylsheet) {
		echo '<link rel="stylesheet"                  href="'.$Stylsheet.'">'."\n";
	}
?>
<!-- JavaScripts -->
<script>
<?php
	require_once $Sitewide['Assets']['Internal']['JS'].'jQl.min.js';
?>
jQl.loadjQ('//cdn.jsdelivr.net/g/jquery,jquery.hashchange');
jQl.boot();
<?php
	// TODO Maybe use a file-combiner for these,
	// and have a single internal asset that gets cached.
	// Same goes for the auto-link.
	include_once $Sitewide['Assets']['Internal']['JS'].'external-links.js';
	include_once $Sitewide['Assets']['Internal']['JS'].'smooth-scrolling.js';
?>
</script>
<?php
	foreach ( $Page['JS'] as $Script ) {
		echo '<script src="'.$Script.'"></script>'."\n";
	}
	echo !empty($Page['Header']) ? $Page['Header'] : false;
	puff_hook('head');
?>
<!-- Website Logo Schema -->
<script type="application/ld+json">
{
	"@context"           : "http://schema.org/",
	"@type"              : "Organization",
	"url"                : "<?php echo $Sitewide['Request']['Scheme'].'://'.$Sitewide['Request']['Host']; ?>",
	"logo"               : "<?php echo $Sitewide['Assets']['External']['Image']; ?>logo.png"
}
</script>
<!-- Website Name Schema -->
<script type="application/ld+json">
{
	"@context"           : "http://schema.org",
	"@type"              : "WebSite",
	"name"               : "<?php echo $Sitewide['Settings']['Site Title']; ?>",
	"alternateName"      : "<?php echo $Sitewide['Settings']['Alternative Site Title']; ?>",
	"url"                : "<?php echo $Sitewide['Request']['Scheme'].'://'.$Sitewide['Request']['Host']; ?>"
}
</script>
<!-- Website Social Schema -->
<script type="application/ld+json">
<?php
echo '{
	"@context"           : "http://schema.org",
	"@type"              : "Organization",
	"name"               : "'.$Sitewide['Settings']['Site Title'].'",
	"url"                : "'.$Sitewide['Request']['Scheme'].'://'.$Sitewide['Request']['Host'].'",
	"sameAs"             : [';
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
if ( $Page['Type'] == 'Article' ) {
	echo '<!-- Article Schema -->
<script type="application/ld+json">
{
	"@context"           : "http://schema.org",
	"@type"              : "NewsArticle",
	"headline"           : "'.$Page['Title'].'",
	"alternativeHeadline": "'.$Page['Tagline'].'",
	"datePublished"      : "'.$Page['Published'].'",
	"description"        : "'.$Page['Description'].'",
	"image"              : [';
	$Images = '';
	foreach ( $Page['Images'] as $Image ) {
		$Images .= "\n".'		"'.$Image.'",';
	}
	echo trim($Images, ',');
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

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

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
{
	"@context"            : "http://schema.org",
	"@type"               : "Organization",
	"name"                : "<?php echo $Sitewide['Settings']['Site Title']; ?>",
	"url"                 : "<?php echo $Sitewide['Request']['Scheme'].'://'.$Sitewide['Request']['Host']; ?>",
	"sameAs"              : [
		<?php
			$Socials = '';
			foreach ( $Sitewide['Social'] as $Social ) {
				$Socials .= PHP_EOL.'		"'.$Social.'",';
			}
			echo trim($Socials, ',');
		?>
	]
}
</script>
<?php
if (
	!empty($Page['Type']) &&
	$Page['Type'] == 'Article'
) {
?>
<!-- Article Schema -->
<script type="application/ld+json">
{
	"@context"            : "http://schema.org",
	"@type"               : "NewsArticle",
	"headline"            : "<?php echo $Page['Title']; ?>",
	"alternativeHeadline" : "<?php echo $Page['Tagline']; ?>",
	"datePublished"       : "<?php echo $Page['Published']; ?>",
	"description"         : "<?php echo $Page['Description']; ?>",
	"image"               : [
		<?php
			if ( !empty($Page['Images']) ) {
				$Images = '';
				foreach ( $Page['Images'] as $Image ) {
					$Images .= PHP_EOL.'		"'.$Image.'",';
				}
				echo trim($Images, ',');
			}
		?>
	]
}
</script>
<?php } ?>

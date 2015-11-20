<?php
if (
	$Sitewide['Settings']['Try to Secure'] &&
	!$Sitewide['Request']['Secure']
) {
?>
<script>
////	HSTS Snippet
// Attempts to load a secure file using a HSTS header, to softly upgrade to SSL.
(function(d,s,f){g=d.createElement(s),u=d.getElementsByTagName(s)[0],g.async=1,g.src=f,u.parentNode.insertBefore(g,u)})
(document,'script','https://<?php echo $Sitewide['Request']['Host']; ?>/assets/hsts-attempt.php')
</script>
<?php
}

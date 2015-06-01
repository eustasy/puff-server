<?php
if (
	$Sitewide['Here Miss']['trackme'] &&
	!empty($Sitewide['Settings']['Google Analytics'])
) {
?>
<script>
(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
ga('create', '<?php echo $Sitewide['Settings']['Google Analytics']; ?>', 'auto');
ga('set', 'forceSSL', true);
ga('set', 'anonymizeIp', true);
ga('require', 'displayfeatures');
ga('send', 'Pageview');
</script>
<?php
}

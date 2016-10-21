<!-- Stylesheets -->
<?php
	puff_hook('head-css-pre');
	if (!empty($Page['CSS'])) {
		foreach ($Page['CSS'] as $Stylsheet) {
			echo '<link rel="stylesheet"                  href="'.$Stylsheet.'">'.PHP_EOL;
		}
	}
	puff_hook('head-css-post');
?>

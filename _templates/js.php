<!-- JavaScripts -->
<?php
	puff_hook('head-js-pre');

	if ( $Sitewide['Page']['UsejQl'] ) {
		echo '<script>';
		require_once $Sitewide['Assets']['Internal']['JS'].'jQl.min.js';
		echo '</script>'.PHP_EOL;
		echo '<script>jQl.loadjQ('.$Page['JQ'].')</script>'.PHP_EOL;
	} else {
		echo '<script src="'.$Page['JQ'].'"></script>'.PHP_EOL;
	}

	if (!empty($Page['JS'])) {
		foreach ( $Page['JS'] as $Key => $Value ) {
			if (
				is_array($Value) &&
				!empty($Value['inline'])
			) {
				echo '<script>'.PHP_EOL;
				include_once $Sitewide['Assets']['Internal']['JS'].$Key;
				echo '</script>'.PHP_EOL;
			} else if (
				is_array($Value) &&
				!empty($Value['internal'])
			) {
				echo '<script src="'.$Sitewide['Assets']['External']['JS'].$Key.'"></script>'.PHP_EOL;
			} else if (
				is_array($Value) &&
				!empty($Value['library']) &&
				$Sitewide['Page']['UsejQl']
			) {
				echo '<script>jQl.loadjQdep(\''.$Key.'\');</script>'.PHP_EOL;
			} else if (
				is_array($Value) &&
				!empty($Value['async'])
			) {
				echo '<script src="'.$Key.'" async></script>'.PHP_EOL;
			} else if (
				is_array($Value) ||
				empty($Value) ||
				(
					is_array($Value) &&
					!empty($Value['library']) &&
					!$Sitewide['Page']['UsejQl']
				)
			) {
				echo '<script src="'.$Key.'"></script>'.PHP_EOL;
			} else if ( !is_array($Value) ) {
				echo '<script src="'.$Value.'"></script>'.PHP_EOL;
			}
		}
	}

	echo !empty($Page['Header']) ? $Page['Header'] : false;

	puff_hook('head-js-post');

	if ( $Sitewide['Page']['UsejQl'] ) {
		echo '<script>jQl.boot();</script>'.PHP_EOL;
	}

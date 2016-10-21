<!-- JavaScripts -->
<?php puff_hook('head-js-pre'); ?>
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
	puff_hook('head-js-post');
	echo '<script>jQl.boot();</script>'.PHP_EOL;

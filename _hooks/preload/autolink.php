<?php

////	AutoLink
// Automatically load files with matching names on their pages.

////	Usage
// '/' becomes 'index'
// '/blog' becomes 'blog'
// '/blog/' becomes 'blog-index'
// '/blog/post-1' becomes 'blog-post-1'

////	Code

// Construct the AutoLink name.
$BaseCompare = parse_url($Sitewide['Settings']['Site Root'], PHP_URL_PATH);
$Sitewide['Request']['AutoLink'] = str_replace($BaseCompare, '', $Sitewide['Request']['Path']);
$Sitewide['Request']['AutoLink'] = str_replace('/', '-', $Sitewide['Request']['AutoLink']);
if ( substr($Sitewide['Request']['Path'], -1) == '/' ) {
	$Sitewide['Request']['AutoLink'] .= 'index';
}
$Sitewide['Request']['AutoLink'] = trim($Sitewide['Request']['AutoLink'], '-');
if ( substr($Sitewide['Request']['AutoLink'], -4, 4) == '.php' ) {
	$Sitewide['Request']['AutoLink'] = substr($Sitewide['Request']['AutoLink'], 0, -4);
}

// Define a function to check files exist server-side before loading them client-side.
function AutoLink($Type) {
	global $Sitewide;
	if ( is_readable($Sitewide['Assets']['Internal'][$Type].$Sitewide['Request']['AutoLink'].$Sitewide['Assets']['Extension'][$Type]) ) {
		$Sitewide['Page'][$Type][] = $Sitewide['Assets']['External'][$Type].$Sitewide['Request']['AutoLink'].$Sitewide['Assets']['Extension'][$Type];
	}
}

// Call for JS and CSS and Image
AutoLink('JS');
AutoLink('CSS');
AutoLink('Image');

// $Page['Image'] should be a single string, not an array.
if ( !empty($Sitewide['Page']['Image'][0]) ) {
	$Sitewide['Page']['Image'] = $Sitewide['Page']['Image'][0];
}

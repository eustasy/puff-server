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
$Sitewide['Request']['AutoLink'] = str_replace('/', '-', $Sitewide['Request']['Path']);
if ( substr($Sitewide['Request']['Path'], -1) == '/' ) {
	$Sitewide['Request']['AutoLink'] .= 'index';
}
$Sitewide['Request']['AutoLink'] = trim($Sitewide['Request']['AutoLink'], '-');

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

<?php

////	Puff Core Settings
//
// The root URL of your site (with trailing slash)
$Sitewide['Settings']['Site Root']                      = 'http://local.localtest.me/';
// A title for your site.
$Sitewide['Settings']['Site Title']                     = 'Puff';
// Something much longer or much shorter.
$Sitewide['Settings']['Alternative Site Title']         = 'Puff is Awesome';
// Stripping the .php from URLs requires server-side configuration.
// Check it works before enabling it.
$Sitewide['Settings']['Strip PHP from URLs']            = false;
// Stop the loading of asset from external domains.
$Sitewide['Settings']['Content Security Policy Header'] = false;
// Honor Do Not Track Headers
$Sitewide['Settings']['Honor DNT Headers']              = true;
// Change to your tracking id like 'UA-1234567-89' for tracking.
$Sitewide['Settings']['Google Analytics']               = false;
// Use a secure connection in future if it's available.
$Sitewide['Settings']['Try to Secure']                  = false;
// Load all the functions to be ready.
$Sitewide['Settings']['AutoLoad']['Functions']          = true;

// Some social settings for your site.
$Sitewide['Social']['Facebook'] = 'https://www.facebook.com/you';
$Sitewide['Social']['Google+']  = 'https://plus.google.com/you';
$Sitewide['Social']['Twitter']  = 'https://twitter.com/you';

// Default Page Settings
$Sitewide['Page']['Title']          = 'Puff';
$Sitewide['Page']['Author']         = 'eustasy';
$Sitewide['Page']['Description']    = 'A website.';
$Sitewide['Page']['Tagline']        = 'A website.';
$Sitewide['Page']['Image']          = '';
$Sitewide['Page']['Published']      = '';
$Sitewide['Page']['Theme Color']    = '#3892E0';
$Sitewide['Page']['Author Name']    = 'John Smith';
$Sitewide['Page']['Google+ Author'] = $Sitewide['Social']['Google+'];
$Sitewide['Page']['Twitter Author'] = $Sitewide['Social']['Twitter'];
$Sitewide['Page']['Twitter Site']   = $Sitewide['Social']['Twitter'];

// Version
$Sitewide['Version']['Core'] = '0.4';

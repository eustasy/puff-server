<?php

////	Settings
//
// A title for your site.
$Sitewide['Settings']['Site Title']                     = 'Puff';
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
$Sitewide['Title']          = 'Puff';
$Sitewide['Author']         = 'eustasy';
$Sitewide['Description']    = 'A website.';
$Sitewide['Image']          = '';
$Sitewide['Theme Color']    = '#3892E0';
$Sitewide['Google+ Author'] = $Sitewide['Social']['Google+'];
$Sitewide['Twitter Author'] = $Sitewide['Social']['Twitter'];
$Sitewide['Twitter Site']   = $Sitewide['Social']['Twitter'];


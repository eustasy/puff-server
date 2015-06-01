<?php

////	WARNING:
// Do NOT use "includeSubDomains"
// You may have insecure sub-domains this would break,
// "preload" would not do anything as you don't meet
// the requirements or you wouldn't be loading this.
// https://hstspreload.appspot.com/

////	Compatibility
// http://caniuse.com/#feat=stricttransportsecurity

header('strict-transport-security: max-age=31536000;');

// No content, send only this.
header($_SERVER['SERVER_PROTOCOL'].' 204 No Content');

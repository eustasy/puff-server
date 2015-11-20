<?php
	require_once __DIR__.'/_puff/sitewide.php';
	$Page['Type']           = 'Page';
	$Page['Title']          = 'Full Page';
	$Page['Description']    = 'A rather full page.';
	$Page['Tagline']        = 'A very full page.';
	$Page['Image']          = $Sitewide['Assets']['External']['Image'].'circular-blue-small-compressed.png';
	$Page['Theme Color']    = '#3892E0';
	$Page['Published']      = '2015-11-16T09:30:00+00:00';
	$Page['Author']         = 'Lewis Goddard';
	$Page['Author Name']    = 'Lewis Goddard';
	$Page['Google+ Author'] = 'https://plus.google.com/+LewisGoddard';
	$Page['Twitter Author'] = 'https://twitter.com/goddardlewis';
	require_once $Sitewide['Templates']['Header'];
?>

<h1>This is a full page.</h1>
<p>It has a type of page, a title, and a nice description, as well as a tagline that won't be used because this isn't an article. This is followed by an image link, a theme color, a published date and author, as well as some nice author links for attribution. These probably won't be used outside of articles either.</p>

<h2>That's not all.</h2>
<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec ut interdum urna. Nam eu eros convallis, scelerisque ex eget, faucibus elit. Aliquam erat volutpat. Integer et dignissim odio. Nunc eget dui sit amet turpis accumsan pulvinar. Quisque vel ipsum vel lectus imperdiet mollis sit amet ut odio. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
<p>Proin nec augue elit. Phasellus id tincidunt mauris. Fusce euismod sem nec enim congue malesuada. Quisque velit leo, bibendum et placerat ut, tincidunt tincidunt neque. Nullam hendrerit risus quis massa ornare malesuada. Curabitur et metus ultrices lectus sagittis molestie at id metus. Nullam quis tincidunt nibh, ut aliquet nisl. Aenean commodo nunc a arcu venenatis, at tempus dui laoreet.</p>
<p>Integer consectetur rhoncus tortor nec ultricies. Phasellus eget posuere nulla. Suspendisse lobortis lectus vel pharetra mollis. In quis imperdiet ipsum, at volutpat massa. Aenean commodo facilisis suscipit. Pellentesque erat leo, vehicula in nunc id, suscipit viverra nisi. Proin a accumsan justo. Sed gravida dui semper tristique ornare. Vestibulum ultricies augue ac ipsum commodo, ut commodo tortor mollis. Aenean dignissim eget felis vitae varius. Suspendisse sollicitudin diam at feugiat suscipit. In malesuada ut odio id egestas. Sed id sem auctor, egestas ante ac, lobortis odio.</p>
<p>Aenean posuere commodo velit, nec congue ligula tempor in. Donec id magna eget leo scelerisque dignissim cursus vitae massa. Etiam pellentesque sagittis ipsum ut efficitur. Praesent fringilla tellus quis ante pellentesque, at volutpat metus consequat. Nullam ultricies purus ac maximus lobortis. Pellentesque vehicula ultricies ligula eu rhoncus. Fusce tristique risus in fermentum auctor. Nulla placerat imperdiet blandit. Donec interdum leo ipsum, sed lacinia diam venenatis quis. Nullam euismod tellus justo, vehicula eleifend purus rutrum ut. Maecenas pretium egestas facilisis. Phasellus feugiat sem at scelerisque cursus. Duis gravida eros nec pellentesque dapibus. Mauris imperdiet rhoncus massa id molestie. Nunc lacus dolor, aliquam eget facilisis ut, dapibus ac ipsum.</p>
<p>Morbi eu sollicitudin lectus, eu egestas purus. Sed quis dapibus erat. Nam gravida ut justo nec posuere. Nulla ac magna vestibulum, condimentum est ut, aliquet lorem. Duis tincidunt lobortis tortor ut laoreet. Sed vestibulum ante nec malesuada placerat. Proin accumsan efficitur nulla vel vehicula. Sed at mi arcu. Ut molestie, dui laoreet vulputate dignissim, urna justo consectetur enim, quis maximus felis ante at nibh. Vestibulum purus tellus, lobortis id eros at, ultrices aliquam nulla. Proin dapibus nisi at nulla interdum, nec finibus lorem faucibus. Etiam blandit mauris ligula, pretium accumsan elit vulputate feugiat. Phasellus eget imperdiet ligula.</p>

<?php
	require_once $Sitewide['Templates']['Footer'];

<?php

require_once __DIR__.'/../_puff/sitewide.php';
$Page['Type']        = 'Action';
$Page['Title']       = 'Log in';

////	IF there is already a session.
if ( !empty($Sitewide['Authenticated']) ) {
	if ( $_GET['redirect'] ) {
		header('Location: '.urldecode($_GET['redirect']), true, 302);
	} else {
		header('Location: '.$Sitewide['Settings']['Site Root'], true, 302);
	}
	exit;
}

if (
	!empty($_POST['username']) &&
	!empty($_POST['password'])
) {
	// Try LDAP first if it is configured.
	if ( !$Sitewide['Settings']['Members']['LDAP Integration']['Enabled'] ) {
		$Login = Puff_Member_LDAP_Authenticate($Username, $Password);
		if ( !empty($Login) && empty($Login['error']) ) {
			Puff_Members_Session_Cookie($Login['session']);
		}
	}

	$Login = Puff_Member_Password_Login($Sitewide['Database']['Connection'], $_POST['username'], $_POST['password']);
	if ( empty($Login['error']) && !empty($Login['session']) ) {
		Puff_Members_Session_Cookie($Login['session']);
	} elseif ( $Login['error'] == 'USERNAME_INVALID' ) {
		$Errors[] = 'The username you entered is not recognized.';
	} elseif ( $Login['error'] == 'USERNAME_VALID__PASSWORD_INCORRECT' ) {
		$Errors[] = 'The password you entered is incorrect.';
	}
}

if (
	!empty($_POST['username']) &&
	empty($_POST['password'])
) {
	$Errors[] = 'You must enter a password.';
}

if (
	empty($_POST['username']) &&
	!empty($_POST['password'])
) {
	$Errors[] = 'You must enter a username.';
}

require_once $Sitewide['Templates']['Header'];
?>

<h1>Log In</h1>
<form method="POST">
<?php
if ( !empty($Errors) ) {
	foreach ($Errors as $error_id => $error) {
		echo '<h2 class="error-text color-flatui-pomegranate">'.$error.'</h2>';
	}
}
?>
<input type="text"     name="username" placeholder="jsmith">
<input type="password" name="password" placeholder="Password1">
<input type="submit"   value="Log In">
</form>

<?php
require_once $Sitewide['Templates']['Footer'];

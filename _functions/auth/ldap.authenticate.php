<?php

////	Modify the `Last used` time on a given password
function Puff_Member_LDAP_Authenticate($Username, $Password) {
	global $Sitewide;
	$Settings = $Sitewide['Settings']['Members']['LDAP Integration'];
	if ( !$Settings['Enabled'] ) {
		return false;
	}

	$LDAP_Connection = ldap_connect($Settings['Address']);
	$RDN = $Settings['Domain'].'\\'.$Username;

	ldap_set_option($LDAP_Connection, LDAP_OPT_PROTOCOL_VERSION, 3);
	ldap_set_option($LDAP_Connection, LDAP_OPT_REFERRALS, 0);

	$Bind = ldap_bind($LDAP_Connection, $RDN, $Password);
	if ( $Bind ) {
		$Filter = '(sAMAccountName='.$Username.')';
		$Results = ldap_search($LDAP_Connection, 'DC='.$Settings['Domain'].',DC=com,DC=local', $Filter);
		ldap_sort($LDAP_Connection, $Results, 'sn');
		// WARNING: Could be multiple results, we assume it's the first one.
		$Results = ldap_get_entries($LDAP_Connection, $Results)[0];
		ldap_close($LDAP_Connection);

		// Create a member if not already in existence
		if ( !Puff_Member_Exists($Sitewide['Database']['Connection'], $Username, false) ) {
			Puff_Member_Create($Sitewide['Database']['Connection'], $Username);
		}

		// The member should now exist, or it already exists and is disabled
		if ( !Puff_Member_Exists($Sitewide['Database']['Connection'], $Username, true) ) {
			// If the bind failed, then the credentials are wrong.
			return array(
				'error' => 'Error: That user account has been disabled.',
				'technical' => 'The LDAP-powered login failed because that user account is disabled.'
			);
		}

		// Run a hook for adding descriptive fields
		puff_hook('ldap-login');

		// Return a session
		$Session = Puff_Member_Session_Create($Sitewide['Database']['Connection'], $Username);
		return $Session;
	}

	// If the bind failed, then the credentials are wrong.
	return array(
		'error' => 'Error: That username and password don\'t seem to be correct.',
		'technical' => 'The LDAP Bind failed with those credentials.'
	);
}

<?php

////	Puff Members Settings
//
// Support BCRYPT Password Storage
$Sitewide['Settings']['Members']['Password Retention']['BCRYPT'] = true;
// Hardware cost for BCRYPT
$Sitewide['Settings']['Members']['Password Retention']['BCRYPT Cost'] = 10;
// Support PLAIN Password Storage
$Sitewide['Settings']['Members']['Password Retention']['PLAIN'] = true;
// Oldest date to keep a password from.
// 365 days = 60*60*24*365 = 44676000
// DO NOT SET TO 0
$Sitewide['Settings']['Members']['Password Retention']['Oldest'] = 44676000;
// Prompt the user when using an old password to try and log in.
$Sitewide['Settings']['Members']['Password Retention']['Prompt on old password'] = false;

////	Enable the LDAP Integration
$Sitewide['Settings']['Members']['LDAP Integration']['Enabled'] = false;
// An address like 'ldap://192.168.1.1'
$Sitewide['Settings']['Members']['LDAP Integration']['Address'] = 'ldap://192.168.1.1';
// A login domain like 'mydomainname'
$Sitewide['Settings']['Members']['LDAP Integration']['Domain'] = 'mydomainname';

// Version
$Sitewide['Version']['Members'] = '0.5.0';

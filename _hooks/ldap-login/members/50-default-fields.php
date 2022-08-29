<?php

// CN  = Common Name: John Smith
Puff_Member_Key_Create($Sitewide['Database']['Connection'], $Username, 'NiceName',   $info[0]['cn'][0]);
Puff_Member_Key_Create($Sitewide['Database']['Connection'], $Username, 'Title',      $info[0]['title'][0]);
Puff_Member_Key_Create($Sitewide['Database']['Connection'], $Username, 'EMail',      $info[0]['mail'][0]);
Puff_Member_Key_Create($Sitewide['Database']['Connection'], $Username, 'Department', $info[0]['department'][0]);
Puff_Member_Key_Create($Sitewide['Database']['Connection'], $Username, 'Telephone',  $info[0]['telephonenumber'][0]);

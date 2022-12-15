<?php
require('dbconfig.php');
 session_start();
 //Include Google Client Library for PHP autoload file
 require_once 'vendor/autoload.php';
 
 //Make object of Google API Client for call Google API
 $google_client = new Google_Client();
 
 //Set the OAuth 2.0 Client ID
 $google_client->setClientId('599638185867-64vofmunrehbcgos916l3ogj31bgn6jg.apps.googleusercontent.com');
 
 //Set the OAuth 2.0 Client Secret key
 $google_client->setClientSecret('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');
 
 //Set the OAuth 2.0 Redirect URI
 $google_client->setRedirectUri('https://hmp.webnd-iitbbs.org/admin-login.php');
 // to get the email and profile 
 $google_client->addScope('email');
 
 $google_client->addScope('profile');


?>
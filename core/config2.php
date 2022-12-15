<?php
require('dbconfig.php');
 session_start();
 //Include Google Client Library for PHP autoload file
 require_once 'vendor/autoload.php';
 
 //Make object of Google API Client for call Google API
 $google_client = new Google_Client();
 
 //Set the OAuth 2.0 Client ID
//  $google_client->setClientId('599638185867-64vofmunrehbcgos916l3ogj31bgn6jg.apps.googleusercontent.com');
 $google_client->setClientId('599638185867-epulrfqluf2op8nuqolkuq8i82qeg0f1.apps.googleusercontent.com');
 
 //Set the OAuth 2.0 Client Secret key
 $google_client->setClientSecret('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');
 
 //Set the OAuth 2.0 Redirect URI
 $google_client->setRedirectUri('http://localhost/CodeRelay_22/admin-login.php');
 // to get the email and profile 
 $google_client->addScope('email');
 
 $google_client->addScope('profile');


?>
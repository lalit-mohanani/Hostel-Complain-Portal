<?php
require('dbconfig.php');

 session_start();

 //config.php
 
 //Include Google Client Library for PHP autoload file
 require_once 'vendor/autoload.php';
 
 //Make object of Google API Client for call Google API
 $google_client = new Google_Client();
 
 //Set the OAuth 2.0 Client ID
//  $google_client->setClientId('599638185867-alv797lbomfgo1t1j4khh1j0pu9v5f5r.apps.googleusercontent.com');
 $google_client->setClientId('599638185867-g5p9edu3cjl7chb13lmnsqeen0u9gac6.apps.googleusercontent.com');
 
 //Set the OAuth 2.0 Client Secret key
 $google_client->setClientSecret('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');
 
 //Set the OAuth 2.0 Redirect URI
 $google_client->setRedirectUri('http://localhost/CodeRelay_22/index.php');
 // to get the email and profile 
 $google_client->addScope('email');
 
 $google_client->addScope('profile');


?>

<?php
$host = "localhost";
$database = "hrmd";
$username = "root";
$password = "";


$conn = mysqli_connect($host, $username, $password, $database);

if(!$conn){
   die('Error in connecting to server or Database');
 }

 session_start();

 //config.php
 
 //Include Google Client Library for PHP autoload file
 require_once 'vendor/autoload.php';
 
 //Make object of Google API Client for call Google API
 $google_client = new Google_Client();
 
 //Set the OAuth 2.0 Client ID
 $google_client->setClientId('599638185867-g0jt41i7d92hj845g5nboe2qmbe7eoi7.apps.googleusercontent.com');
 
 //Set the OAuth 2.0 Client Secret key
 $google_client->setClientSecret('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');
 
 //Set the OAuth 2.0 Redirect URI
 $google_client->setRedirectUri('http://localhost/CodeRelay_22/admin-login.php');
 // to get the email and profile 
 $google_client->addScope('email');
 
 $google_client->addScope('profile');


?>
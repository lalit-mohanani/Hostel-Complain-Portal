<?php
$host = "db4free.net"; 
$database = "hostel_db";
$username = "webnduser";
$password = "webndPass";


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
 $google_client->setClientId('599638185867-cc0vt6gem2qefjmml3gss45du9a176gs.apps.googleusercontent.com');
 
 //Set the OAuth 2.0 Client Secret key
 $google_client->setClientSecret('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');
 
 //Set the OAuth 2.0 Redirect URI
 $google_client->setRedirectUri('http://localhost/CodeRelay_22/index.php');
 // to get the email and profile 
 $google_client->addScope('email');
 
 $google_client->addScope('profile');


?>

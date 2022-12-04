<?php
$host = "localhost";
$database = "u116929436_hmp";
$username = "u116929436_hmp";
$password = "Shashwat545@";


$conn = mysqli_connect($host, $username, $password, $database);

if(!$conn){
   die('Error in connecting to server or Database');
 }
 
 ?>
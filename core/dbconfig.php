<?php
$host = "localhost";
$database = "u834073356_hmp";
$username = "u834073356_hmp";
$password = "Shashwat545@";


$conn = mysqli_connect($host, $username, $password, $database);

if(!$conn){
   die('Error in connecting to server or Database');
 }
 
 ?>
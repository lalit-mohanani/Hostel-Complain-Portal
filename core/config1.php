<?php
$host = "localhost";
$database = "hrmd";
$username = "root";
$password = "";


$conn = mysqli_connect($host, $username, $password, $database);

if(!$conn){
   die('Error in connecting to server or Database');
 }
?>
<?php

require '../core/session.php';
// require '../core/config.php';
require '../core/admin-key.php';
$host = "localhost";
$database = "hrmd";
$username = "root";
$password = "";


$conn = mysqli_connect($host, $username, $password, $database);

if(!$conn){
   die('Error in connecting to server or Database');
 }

 session_start();

		$ref = $_GET['ref'];
		mysqli_query($conn,"UPDATE `stats` SET `Status` = '0' WHERE `ref_no` = $ref")or die(mysql_error());
		header("Location:message.php");

?>

<?php

require '../core/session.php';
// require '../core/config.php';
require '../core/admin-key.php';
$database = "hrmd";
$username = "root";
$password = "";


$conn = mysqli_connect($host, $username, $password, $database);

if(!$conn){
   die('Error in connecting to server or Database');
 }

 session_start();
$ref = $_GET['ref'];
$result = mysql_query("SELECT * FROM `stats` WHERE ref_no='$ref'");
$arry = mysql_fetch_array($result);
$statusa=$arry['status'];
$statusa++;
		mysql_query("UPDATE `stats` SET `Status`=$statusa where `ref_no` = $ref")or die(mysql_error());
		
		header("Location:message.php");

?>

<?php

require '../core/session.php';
require '../core/dbconfig.php';
require '../core/admin-key.php';
 session_start();
$ref = $_GET['ref'];
$result = mysqli_query($conn,"SELECT * FROM `stats` WHERE ref_no='$ref'");
$arry = mysqli_fetch_array($result);
$statusa=$arry['status'];
$statusa++;
		mysqli_query($conn,"UPDATE `stats` SET `Status`=$statusa where `ref_no` = $ref")or die(mysql_error());
		
		header("Location:message.php");

?>

<?php

require '../core/session.php';
require '../core/config1.php';
require '../core/admin-key.php';
$ref = $_GET['ref'];
$result = mysqli_query($conn,"SELECT * FROM `stats` WHERE ref_no='$ref'");
$arry = mysqli_fetch_array($result);
$statusa=$arry['status'];
$statusa++;
		mysqli_query($conn,"UPDATE `stats` SET `Status`=$statusa where `ref_no` = $ref")or die(mysqli_error($conn));
		
		header("Location:message.php");

?>

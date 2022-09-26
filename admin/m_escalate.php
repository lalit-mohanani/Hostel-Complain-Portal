<?php

require '../core/session.php';
require '../core/config.php';
require '../core/admin-key.php';
$ref = $_GET['ref'];
$result = mysqli_query($this->link,"SELECT * FROM `stats` WHERE ref_no='$ref'");
$arry = mysqli_fetch_array($result);
$statusa=$arry['status'];
$statusa++;
		mysqli_query($this->link,"UPDATE `stats` SET `Status`=$statusa where `ref_no` = $ref")or die(mysqli_error($this->link));
		
		header("Location:message.php");

?>

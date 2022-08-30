<?php

require '../core/session.php';
require '../core/config.php';
require '../core/admin-key.php';
$ref = $_GET['ref'];
$result = mysql_query("SELECT * FROM `stats` WHERE ref_no='$ref'");
$arry = mysql_fetch_array($result);
$statusa=$arry['status'];
$statusa++;
		mysql_query("UPDATE `stats` SET `Status`=$statusa where `ref_no` = $ref")or die(mysql_error());
		
		header("Location:message.php");

?>

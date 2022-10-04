<?php

require '../core/session.php';
require '../core/config1.php';
require '../core/admin-key.php';

		$ref = $_GET['ref'];
		
		mysqli_query($conn,"UPDATE `stats` SET `Status`=4 WHERE `ref_no` = $ref")or die(mysqli_error($conn));
		// mysql_query("DELETE FROM `cmp_log` WHERE id='$id'")or die(mysql_error());
		header("Location:message.php");

?>

<?php

require '../core/session.php';
require '../core/config.php';
require '../core/admin-key.php';

		$ref = $_GET['ref'];
		
		mysqli_query($this->link,"UPDATE `stats` SET `Status`=4 WHERE `ref_no` = $ref")or die(mysqli_error($this->link));
		// mysql_query("DELETE FROM `cmp_log` WHERE id='$id'")or die(mysql_error());
		header("Location:message.php");

?>

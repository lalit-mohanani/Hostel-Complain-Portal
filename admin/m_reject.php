<?php

require '../core/session.php';
require '../core/config1.php';
require '../core/admin-key.php';

		$ref = $_GET['ref'];
		mysqli_query($conn,"UPDATE `stats` SET `Status` = '0' WHERE `ref_no` = $ref")or die(mysqli_error($conn));
		header("Location:message.php");

?>

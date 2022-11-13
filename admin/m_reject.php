<?php

require '../core/session.php';
require '../core/dbconfig.php';
require '../core/admin-key.php';

 session_start();

		$ref = $_GET['ref'];
		mysqli_query($conn,"UPDATE `stats` SET `Status` = '0' WHERE `ref_no` = $ref")or die(mysql_error());
		header("Location:message.php");

?>

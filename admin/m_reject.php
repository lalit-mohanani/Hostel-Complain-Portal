<?php

require '../core/session.php';
require '../core/config.php';
require '../core/admin-key.php';

		$ref = $_GET['ref'];
		mysqli_query($this->link,"UPDATE `stats` SET `Status` = '0' WHERE `ref_no` = $ref")or die(mysqli_error($this->link));
		header("Location:message.php");

?>

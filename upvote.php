<?php

require './core/session.php';
require './core/config1.php';
require 'core/redirect.php';
session_start();
$ref = $_GET['ref'];
$result = mysqli_query($conn, "SELECT * FROM `cmp_log` WHERE ref_no='$ref'");
$arry = mysqli_fetch_array($result);
$public_cmp_freq = $arry['public_cmp_freq'];
$public_cmp_freq++;

$email = $_SESSION['email'];
mysqli_query($conn, "INSERT INTO `upvotes` VALUES ('$ref','$email')");

mysqli_query($conn, "UPDATE `cmp_log` SET `public_cmp_freq`=$public_cmp_freq WHERE `ref_no` = '$ref'") or die(mysqli_error($conn));
// mysql_query("DELETE FROM `cmp_log` WHERE id='$id'")or die(mysql_error());
header("Location:public.php?ref=$ref");

?>

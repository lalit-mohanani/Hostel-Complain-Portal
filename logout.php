<?php
require 'core/config1.php';
$google_client->revokeToken();
$login_button = '';
session_start();
session_unset();
session_destroy();
header ("Location:index.php");
?>

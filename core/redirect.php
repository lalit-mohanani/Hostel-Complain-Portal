<?php
if (isset($_REQUEST['username'])===true) {

    header('Location:admin/admin-profile.php');

}
elseif(isset($_REQUEST['email'])===true){

  header('Location:profile.php');

}else{

}

?>

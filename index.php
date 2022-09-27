<?php


  require 'core/session.php';
   require 'core/config1.php';
  // require 'db_credentials.php';
  require 'core/redirect.php';
  // session_start();
  // New Addition
 
  // $db = mysqli_connect('localhost', 'root', '');
  // echo "gay bhai";
  // Error message

  // if(mysqli_connect_errno()) {
  //   $msg = "Failed to Load: ";
  //   $msg .= mysqli_connect_error();
  //   $msg .= " : " . mysqli_connect_errno();
  //   exit($msg);
  // }

  // end->Error message

  // end->New Addition

//  echo "$_SESSION[username]";
// $_SESSION['username']=$_POST['email'];
$login_button = '';


if(isset($_GET["code"]))
{

 $token = $google_client->fetchAccessTokenWithAuthCode($_GET["code"]);


 if(!isset($token['error']))
 {
 
  $google_client->setAccessToken($token['access_token']);

 
  $_SESSION['access_token'] = $token['access_token'];


  $google_service = new Google_Service_Oauth2($google_client);

 
  $data = $google_service->userinfo->get();

 
  if(!empty($data['given_name']))
  {
   $_SESSION['user_first_name'] = $data['given_name'];
  }

  if(!empty($data['family_name']))
  {
   $_SESSION['user_last_name'] = $data['family_name'];
  }

  if(!empty($data['email']))
  {
   $_SESSION['user_email_address'] = $data['email'];
  }

  if(!empty($data['gender']))
  {
   $_SESSION['user_gender'] = $data['gender'];
  }

  if(!empty($data['picture']))
  {
   $_SESSION['user_image'] = $data['picture'];
  }
 }
}


if(!isset($_SESSION['access_token']))
{
 $login_button = '<a href="'.$google_client->createAuthUrl().'">Login With Google</a>';
}

?>



<?php
  // if(isset($_REQUEST['email'])===true){
  //   // echo "kaam baki";
  //     header("location:profile.php");
  // }
  // // else {
  // //   echo "gay bhai";
  // // }

  // $message="";

  // if(empty($_POST)===false){
  // $email = mysqli_real_escape_string($conn,$_POST['email']);
  // $password = mysqli_real_escape_string($conn,$_POST['password']);
  //   if(empty($email) || empty($password)){
  //         header('Location:index.php');
  //   }else{
  //       $query1=mysqli_query($conn,"SELECT * FROM `circle` WHERE email='$email' and password='$password'") or die(mysqli_error($conn));
  //       if(mysqli_num_rows($query1)>0){
  //           $_SESSION['email'] = $_REQUEST['email'];
  //           header('Location:profile.php');
  //       }else{
  //         $message="Your username or password is incorrect";
  //       }
  //     }
  // }
 ?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Hostel Management Portal  </title>
    <link rel="shortcut icon" href="files/img/hm12.jpg">
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

    <!-- <link rel="stylesheet" href="files/css/bootstrap.css"> -->
    <link rel="stylesheet" href="files/css/custom.css">
  </head>
  <body >

    <div class="animated fadeIn">


    <div class="cover user text-center">

    <br>
    <br>
      
    <img src = "./files/img/iitbbs_logo.png" fill="#fff" height="148" viewBox="0 0 24 24" width="148" class="shad">
    <h2>USER LOGIN</h2>
      <!-- <svg fill="#fff" height="148" viewBox="0 0 24 24" width="148" xmlns="http://www.w3.org/2000/svg" class="shad">
          <path d="M0 0h24v24H0z" fill="none"/>
          <path d="M5 16c0 3.87 3.13 7 7 7s7-3.13 7-7v-4H5v4zM16.12 4.37l2.1-2.1-.82-.83-2.3 2.31C14.16 3.28 13.12 3 12 3s-2.16.28-3.09.75L6.6 1.44l-.82.83 2.1 2.1C6.14 5.64 5 7.68 5 10v1h14v-1c0-2.32-1.14-4.36-2.88-5.63zM9 9c-.55 0-1-.45-1-1s.45-1 1-1 1 .45 1 1-.45 1-1 1zm6 0c-.55 0-1-.45-1-1s.45-1 1-1 1 .45 1 1-.45 1-1 1z"/>
      </svg> -->

      <!-- <br> -->
      <!-- <h2 style="color:blue">USER LOGIN</h2> -->
    </div>



      <div class="padd" style="background: #FFFFFF">

        <div class="col-lg-12 text-center">
              <form class="" method="post" autocomplete="off">
                <label for="username"></label>
                <input type="email" name="email" placeholder="Email" id="email">
                <br><br>
                <label for="password"></label>
                <input type="password" name="password" placeholder="Password" id="pass">
                <br><br>
                <button type="submit" class="log">Login</button>
                <?php
                if($login_button == ''){
                  // echo '<div class="panel-heading">Welcome User</div><div class="panel-body">';
                  // echo '<img src="'.$_SESSION["user_image"].'" class="img-responsive img-circle img-thumbnail" />';


                  echo '<h3><b>Name :</b> '.$_SESSION['user_first_name'].' '.$_SESSION['user_last_name'].'</h3>';
                  echo '<h3><b>Email :</b> '.$_SESSION['user_email_address'].'</h3>';
                  echo '<h3><a href="logout.php">Logout</h3></div>';
                 }
                 else
                 {
                   echo '<div align="center">'.$login_button . '</div>';
                  }
                ?>
                <br><br>
                <span class="red"><?php echo $message; ?></span>
              </form>
              <br>
                <!-- Don't have an acccount ? <a href="signup.php">Sign Up  </a> -->

        </div>
      </div>

      <div class="links">
        <!-- <a href="dummy-login.php">Engineer</a> -->
        &nbsp;&nbsp;&nbsp;&nbsp;<a href="admin-login.php">Admin </a>
      </div>

    </div>
    <?php
    include 'footer.php';
    include 'core/jsscript.php';
    ?>


  </body>
</html>

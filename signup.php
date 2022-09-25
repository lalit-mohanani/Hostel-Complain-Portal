<?php
  require 'core/config.php';
  error_reporting(0);


  if(empty($_POST)===false){
    $rollno = mysql_real_escape_string($_POST['rollno']);
    $name = mysql_real_escape_string($_POST['name']);
    $username = mysql_real_escape_string($_POST['username']);
    $email =  mysql_real_escape_string($_POST['email']);
    $password =  mysql_real_escape_string($_POST['password']);
    if(empty($name) || empty($username) || empty($email) ||empty($password) || empty($rollno)){

    }elseif (!filter_var($email,FILTER_VALIDATE_EMAIL) === true) {
      $message = "It's not a valid email address";
    }else{
      mysql_query("INSERT INTO `circle` VALUES ('0','$rollno','$name','$username','$email','$password',NOW())") or die(mysql_error());
      $message = "Your account has been Registerd";
      }
  }
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Hostel Management Portal  </title>
    <link rel="shortcut icon" href="files/img/hm12.jpg">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <!-- <link rel="stylesheet" href="files/css/bootstrap.css"> -->
    <link rel="stylesheet" href="files/css/custom.css">
  </head>
  <body>

    <div class="animated fadeIn">


    <div class="cover user text-center">
      <!-- <svg fill="#fff" height="148" viewBox="0 0 24 24" width="148" xmlns="http://www.w3.org/2000/svg" class="shad">
          <path d="M0 0h24v24H0z" fill="none"/>
          <path d="M5 16c0 3.87 3.13 7 7 7s7-3.13 7-7v-4H5v4zM16.12 4.37l2.1-2.1-.82-.83-2.3 2.31C14.16 3.28 13.12 3 12 3s-2.16.28-3.09.75L6.6 1.44l-.82.83 2.1 2.1C6.14 5.64 5 7.68 5 10v1h14v-1c0-2.32-1.14-4.36-2.88-5.63zM9 9c-.55 0-1-.45-1-1s.45-1 1-1 1 .45 1 1-.45 1-1 1zm6 0c-.55 0-1-.45-1-1s.45-1 1-1 1 .45 1 1-.45 1-1 1z"/>
      </svg> -->
      <br>
      <br>
      <img src = "./files/img/iitbbs_logo.png" fill="#fff" height="148" viewBox="0 0 24 24" width="148" class="shad">
      <h2>USER SIGNUP</h2>
      <h2>Sign Up</h2>
    </div>

      <div class="padd">
        <div class="col-lg-12 text-center">
              <form class="" method="post" autocomplete="off">
                <input type="text" name="name" placeholder="Your Name">
                <br><br>
                <input type="text" name="username" placeholder="User Name">
                <br><br>
                <input type="text" name="rollno" placeholder="Your Rollno">
                <br><br>
                <input type="text" name="email" placeholder="Your Email">
                <br><br>
                <input type="password" name="password" placeholder="Password">
                <br><br>
                <?php echo "<p>".$message."</p>"; ?>
                <br>
                <button type="submit" class="log">Sign Up</button>
                <br><br>
              </form>
              <br>Already have an acccount ? <a href="index.php">Login  </a>
        </div>
      </div>
      <div class="links">
        <a href="index.php">Home </a>
      </div>
  </div>
    <?php
      include 'footer.php';
      include 'core/jsscript.php';
      ?>
    <script src="files/js/jquery.js"></script>
    <script src="files/js/bootstrap.min.js"></script>
    <script src="files/js/script.js"></script>

  </body>
</html>

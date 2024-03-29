<?php
//user login and homepage

require 'core/session.php';
require 'core/config2.php';
require 'core/redirect.php';

$login_button = '';

if (isset($_GET["code"])) {

  $token = $google_client->fetchAccessTokenWithAuthCode($_GET["code"]);


  if (!isset($token['error'])) {

    $google_client->setAccessToken($token['access_token']);


    $_SESSION['access_token'] = $token['access_token'];


    $google_service = new Google_Service_Oauth2($google_client);


    $data = $google_service->userinfo->get();

    $email = $data['email'];
    $que = mysqli_query($conn, "SELECT COUNT(*) as count FROM `admin` WHERE email='$email'");
    $data2 = mysqli_fetch_assoc($que);

    if (!empty($data['given_name'])) {
      $_SESSION['name'] = $data['given_name'];
    }

    if (!empty($data['family_name'])) {
      $_SESSION['user_last_name'] = $data['family_name'];
    }

    if (!empty($data['email']) && $data2['count'] > 0) {
      $_SESSION['email'] = $data['email'];
    } else {
      // echo '<script type="text/javascript">';
      // echo ' alert("JavaScript Alert Box by PHP")';  //not showing an alert box.
      // echo '</script>';
      header("location:logout.php");
    }

    if (!empty($data['picture'])) {
      $_SESSION['image'] = $data['picture'];
    }
  }
}


if (!isset($_SESSION['access_token'])) {
  $login_button = '<a class="btn btn-primary hovering" style=" width:30%;color:white; background-color: #4db6ac ;border:0px; margin-top:60px;border-radius:4px; font: size 0.9em;em;" href="' . $google_client->createAuthUrl() . '"><i style="margin-right: 0.5em; "class="fa-brands fa-google"></i><b style="font-size:0.9em ;"> Login</b></a>';
}
?>

<?php
// $email = $_SESSION['email'];
// $que = mysqli_query($conn, "SELECT COUNT(*) as count FROM `admin` WHERE email=='$email'");
// $data2=mysqli_fetch_assoc($que);

if (isset($_SESSION['email']) === true) {
  // echo "kaam baki";
  header("location:admin/admin-profile.php");
}
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Hostel Management Portal</title>
  <link rel="shortcut icon" href="files/img/hm12.jpg">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  <!-- <link rel="stylesheet" href="files/css/bootstrap.css"> -->
  <link rel="stylesheet" href="files/css/custom.css">
  <style>
    .accessDenied {
      padding: 8px 12px;
      margin: 4px 6px;
      border-radius: 5px;
      background-color: #cf1815;
      color: white;
      font-size: 24px;
    }
  </style>
</head>

<body>
  <div class="animated fadeIn">

    <div class="cover admin text-center">
      <br>
      <br>
      <!-- <svg fill="#fff" height="148" viewBox="0 0 24 24" width="148" xmlns="http://www.w3.org/2000/svg" class="shad">
          <path d="M0 0h24v24H0z" fill="none"/>
          <path d="M5 16c0 3.87 3.13 7 7 7s7-3.13 7-7v-4H5v4zM16.12 4.37l2.1-2.1-.82-.83-2.3 2.31C14.16 3.28 13.12 3 12 3s-2.16.28-3.09.75L6.6 1.44l-.82.83 2.1 2.1C6.14 5.64 5 7.68 5 10v1h14v-1c0-2.32-1.14-4.36-2.88-5.63zM9 9c-.55 0-1-.45-1-1s.45-1 1-1 1 .45 1 1-.45 1-1 1zm6 0c-.55 0-1-.45-1-1s.45-1 1-1 1 .45 1 1-.45 1-1 1z"/>
      </svg> -->
      <img src="./files/img/iitbbs_logo.png" fill="#fff" height="148" viewBox="0 0 24 24" width="148" class="shad">

      <h2>ADMIN LOGIN</h2>
    </div>

    <div class="padd" style="background: #FFFFFF">

      <div class="col-lg-12 text-center">
        <form class="" method="post" autocomplete="off">
          <!-- <label for="username"></label>
                <input type="text" name="username" placeholder="Admin username" id="email">
                <br><br>
                <label for="password"></label>
                <input type="password" name="password" placeholder="Password" id="pass">
                <br><br>
                <button type="submit" class="log">Login</button>
                <br><br> -->
          <?php
          if ($login_button == '') {
            // echo '<div class="panel-heading">Welcome User</div><div class="panel-body">';
            // echo '<img src="'.$_SESSION["user_image"].'" class="img-responsive img-circle img-thumbnail" />';

            // echo "<span class='accessDenied'>Access Denied</span>";
            // header("location:logout.php");
            // echo '<h3><b>Name :</b> '.$_SESSION['name'].' '.$_SESSION['user_last_name'].'</h3>';
            // echo '<h3><b>Email :</b> '.$_SESSION['email'].'</h3>';
            // echo '<h3><a href="logout.php">Logout</h3></div>';
          } else {
            echo '<div align="center">' . $login_button . '</div>';
          }
          ?>
          <span class="red"><?php echo $message; ?></span>
        </form>
        <br>
      </div>
    </div>
    <div class="links">
      &nbsp;&nbsp;&nbsp;&nbsp;<a href="index.php">User </a>
    </div>
  </div>
  <footer style="padding-top: 30px;">
    <a href="blog/blog.php" style="padding-bottom:20px; font-size:0.9em;">Email: secyweb.sg@iitbbs.ac.in </a> &nbsp;&nbsp;|
    <a href="blog/documentation.php" style="font-size:0.9em;">Phone: 1234567890</a>
  </footer>
  <?php
  include 'footer.php';
  include 'core/jsscript.php';
  ?>

</body>

</html>
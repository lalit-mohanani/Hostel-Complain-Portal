<?php
require '../core/session.php';
require '../core/config1.php';
require '../core/admin-key.php';

$username = $_SESSION['username'];
$qu = mysqli_query($conn, "SELECT * FROM admin WHERE username='$username'");
$ar = mysqli_fetch_array($qu);
$aid = $ar['id'];

date_default_timezone_set('Asia/Kolkata');
$update = date('M, l, h:i a');
if (isset($_POST['update'])) {
  $name = mysqli_real_escape_string($conn, $_POST['name']);
  $username = mysqli_real_escape_string($conn, $_POST['username']);
  $password = mysqli_real_escape_string($conn, $_POST['password']);
  if (empty($name) || empty($username) || empty($password)) {
    $message = "
          <div class='alert errr' id='msg'>
          <div class ='text-right' id='close'>
              <svg class='pointer' fill='#FFF' height='24' viewBox='0 0 24 24' width='24' xmlns='http://www.w3.org/2000/svg'>
                  <path d='M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12z'/>
                  <path d='M0 0h24v24H0z' fill='none'/>
              </svg>
          </div>
           <p>Choose Name, Username And Password !!</p>
          </div>";
  } else {
    mysqli_query($conn, "UPDATE admin SET name='$name',username='$username',password='$password',up_time='$update' WHERE id='1'") or die(mysqli_error($conn));
    $message = "
            <div class='alert succ' id='msg'>
              <div class ='text-right' id='close'>
                <svg class='pointer' fill='#ccc' height='24' viewBox='0 0 24 24' width='24'     xmlns='http://www.w3.org/2000/svg'>
                  <path d='M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12z'/>
                  <path d='M0 0h24v24H0z' fill='none'/>
                </svg>
                <p class='text-center'>Your credentials has been Changed</p>
              </div>
            </div>
            ";
  }
}
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Hostel Management Portal </title>
  <link rel="shortcut icon" href="../files/img/hm12.jpg">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  <!-- <link rel="stylesheet" href="../files/css/bootstrap.css"> -->
  <link rel="stylesheet" href="../files/css/custom.css">
  <script src="../files/js/script.js"></script>
  <style media="screen">
    table,
    td {
      border: 0px;
    }
  </style>
  <style>
    li {
      font-size: 21px;
    }
  </style>
</head>

<body>
  <div class="container-fluid overflow-hidden">
    <div class="row vh-100 overflow-auto">
      <?php require 'nav.php'; ?>

      <div class="col d-flex flex-column h-sm-100">
        <main class="row overflow-auto" style="height:100%;">
          <div class="animated fadeIn" style="padding:0px">
            <div class="cover main">
              <h1>General Settings</h1>
            </div>
            <div class="col-md-auto">
              <div class="col-lg-12">
                <form class="" action="" method="post" autocomplete="off">
                  <?php
                  $query1 = mysqli_query($conn, "SELECT * FROM admin WHERE id='$aid'");
                  while ($arry1 = mysqli_fetch_array($query1)) {
                  ?>
                    <table>
                      <tr>
                        <td>
                          <h4>Update your data</h4><br><br>
                        </td>
                      </tr>
                      <tr>
                        <td>Last Updated on :</td>
                        <td> <?php echo $arry1['up_time']; ?></td>
                      </tr>
                      <tr>
                        <td>Name</td>
                        <td><input type="text" name="name" placeholder="<?php echo $arry1['name']; ?>"></td>
                      </tr>
                      <tr>
                        <td>Username</td>
                        <td><input type="text" name="username" placeholder="<?php echo $arry1['username']; ?>"></td>
                      </tr>
                      <tr>
                        <td>Password</td>
                        <td><input type="text" name="password" placeholder="<?php echo $arry1['password']; ?>"></td>
                      </tr>
                      <tr>
                        <td></td>
                        <td><button name="update" type="submit" class="log">Save</button></td>
                      </tr>
                </form>
              <?php
                  }
                  echo $message;
              ?>
              </table>
              </div>
            </div>
          </div>
        </main>
      </div>
    </div>
  </div>
  <?php
  include 'footer2.php';
  ?>
  <script src="../files/js/jquery.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
  <script>
    $(document).ready(function() {
      $("#close").click(function() {
        $("#msg").remove();
      });
    });
  </script>
</body>

</html>
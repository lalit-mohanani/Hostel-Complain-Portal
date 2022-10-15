<?php
require '../core/session.php';
// require '../core/config.php';
require '../core/admin-key.php';

$host = "db4free.net"; 
$database = "hostel_db";
$username = "webnduser";
$password = "webndPass";


$conn = mysqli_connect($host, $username, $password, $database);

if(!$conn){
   die('Error in connecting to server or Database');
 }

 session_start();

?>
 <?php
  $username=$_SESSION['name']." ".$_SESSION['user_last_name'];
  $email=$_SESSION['email'];
  $query1 = mysqli_query($conn,"SELECT * FROM admin WHERE email='$email'");
  $arry1 = mysqli_fetch_array($query1);
  $usr = $arry1['name'];
  $aid = $arry1['id'];
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
            <?php
      if (isset($_SESSION['email'])===true) {echo "<h1> Welcome, ".$usr."</h1><a class='button logout' style='background-color: rgb(62, 179, 153);border-radius: 4%; margin-left:55%; margin-bottom:10%; 'href='../logout.php' onClick='javascript:return confirm ('Do you really want to logout ?');'> Logout </a>";}
       ?>
       
       &nbsp;&nbsp;&nbsp;


      <p class="text-right" style="margin-left:80%" >
        <?php echo date("l, d M"); ?>
      </p>

            </div>

            <div class="col-md-auto">
              <div class="col-lg-12" style="padding:10px 10px;">
                <div class="analysis">
                  <?php

// $users = mysqli_query($conn,"SELECT * FROM `circle` ");
// $count_users = mysqli_num_rows($users);

$cmp = mysqli_query($conn,"SELECT * FROM `cmp_log` where cmp_log.ref_no in (select stats.ref_no from `stats` where status not in (0,4))");
$count_cmp = mysqli_num_rows($cmp);

$frd = mysqli_query($conn,"SELECT * FROM `stats` where status=($aid+1)");
$count_frd = mysqli_num_rows($frd);
                  ?>

                  <div class="row row-cols-1 row-cols-md-3 mb-3 text-center" style="padding-top:10px;">
                    <div class="col">
                      <div class="card mb-4 rounded-3 shadow-sm">
                        <div class="card-header py-3" style="background-color:#3498db">
                          <h4 class="my-0 fw-normal">Total Users</h4>
                        </div>
                        <div class="card-body">
                          <h1 class="card-title pricing-card-title"><?php echo "1000"; ?></h1>
                          <ul class="list-unstyled mt-3 mb-4">
                            <li>data_1</li>
                            <li>data_2</li>
                            <li>data_3</li>
                            <li>data_4</li>
                          </ul>
                          <!-- <button type="button" class="w-100 btn btn-lg btn-outline-primary">Sign up for free</button> -->
                        </div>
                      </div>
                    </div>
                    <div class="col">
                      <div class="card mb-4 rounded-3 shadow-sm">
                        <div class="card-header py-3" style="background-color:#4db6ac">
                          <h4 class="my-0 fw-normal">Active Complaints</h4>
                        </div>
                        <div class="card-body">
                          <h1 class="card-title pricing-card-title"><?php echo $count_cmp; ?></h1>
                          <ul class="list-unstyled mt-3 mb-4">
                            <li>data_1</li>
                            <li>data_2</li>
                            <li>data_3</li>
                            <li>data_4</li>
                          </ul>
                          <!-- <button type="button" class="w-100 btn btn-lg btn-primary">Get started</button> -->
                        </div>
                      </div>
                    </div>
                    <div class="col">
                      <div class="card mb-4 rounded-3 shadow-sm">
                        <div class="card-header py-3" style="background-color:#3498db">
                          <h4 class="my-0 fw-normal">Forwarded</h4>
                        </div>
                        <div class="card-body">
                          <h1 class="card-title pricing-card-title">
                            <?php
                            if ($aid != 3) {
                              echo $count_frd;
                            }
                            ?>
                          </h1>
                          <ul class="list-unstyled mt-3 mb-4">
                            <li>data_1</li>
                            <li>data_2</li>
                            <li>data_3</li>
                            <li>data_4</li>
                          </ul>
                          <!-- <button type="button" class="w-100 btn btn-lg btn-primary">Contact us</button> -->
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </main>
        <!-- <footer class="row bg-light py-4 mt-auto">
                <div class="col"> Footer content here... </div>
            </footer> -->
      </div>
    </div>
  </div>

  <?php
  include 'footer2.php';
  ?>

  <script src="../files/js/jquery.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
  <script src="../files/js/script.js"></script>

</body>

</html>

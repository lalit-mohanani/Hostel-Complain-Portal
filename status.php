<?php
  require './core/session.php';
  require './core/config.php';
  require './core/user_key.php';

 ?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Hostel Management Portal  </title>
    <link rel="shortcut icon" href="./files/img/hm12.jpg">
    <link rel="stylesheet" href="./files/css/bootstrap.css">
    <link rel="stylesheet" href="./files/css/custom.css">


  </head>
  <body>

  <div class="animated fadeIn">


  <div class="cover user text-center" style="height:120px;">
      <br>
      <h2>Complaints</h2>
    </div>

  <?php require 'nav-profile.php'; ?>
    <div class="div">
        <div class="col-lg-12" >
          <?php 
          $email = $_SESSION['email'];
          $result = mysql_query("SELECT * FROM `cmp_log` WHERE email='$email'");
            $num_rows = mysql_num_rows($result);
            
            ?>
              <!-- <div class='admin-data'>
                Complaints
                <span class='button view' href=''><?php echo "$num_rows";?> </a>
              </div> -->
              
              <br><br><br><br>
              <br><br>

              <br>
              <h2 class="text-center"><?php echo $message; ?></h2>
              <br><br>

              <ol style="color:darkcyan;">
          <?php

            while($data=mysql_fetch_array($result)) {
            // echo"<div class='admin-data'>";
            echo "<li class='admin-data' style='width:600px;'>";
            echo $data['CategoryOfIssue'];
            $empty=$data['CategoryOfIssue'];
            echo "<a class='button view' href='status-view.php?ref=$data[ref_no]'>View Status</a>";
            // echo "</div>";
            echo "</li>";
            echo "<br><br><br><br><br>";

          }
            if (empty($empty)==true) {
              $message = "You Have no Message !!";
            }else{
              $message = "You Have got some Message";

            }


          ?>
          </ol>


          <br><br><br><br><br><br><br><br><br><br><br><br>

        </div>
      </div>

  </div>

      <footer2>
      <br><br>&copy <?php echo date("Y"); ?> <?php echo $web_name; ?>
      </footer2>

    <script src="files/js/jquery.js"></script>
    <script src="files/js/bootstrap.min.js"></script>
    <script src="files/js/script.js"></script>

  </body>
</html>

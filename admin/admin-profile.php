<?php
  require '../core/session.php';
  require '../core/config.php';
  require '../core/admin-key.php';
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Hostel Management Portal  </title>
    <link rel="shortcut icon" href="../files/img/hm12.jpg">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <!-- <link rel="stylesheet" href="../files/css/bootstrap.css"> -->
    <link rel="stylesheet" href="../files/css/custom.css">
    <script src="../files/js/script.js"></script>

  </head>
  <body >
  <?php 
   $username=$_SESSION['username'];
   $query1=mysql_query("SELECT * FROM admin WHERE username='$username'"); 
   $arry1=mysql_fetch_array($query1); 
   $usr=$arry1['name'];
   $aid=$arry1['id'];
   ?>

  <?php require 'nav.php'; ?>

  <div class="animated fadeIn">


    <div class="cover main">
      <?php
      if (isset($_SESSION['username'])===true) {echo "<h1> Welcome, ".$usr."</h1>";}
       ?>
       <a class="button logout" style="background-color: rgb(62, 179, 153);border-radius: 4%;"href="../logout.php" onClick="javascript:return confirm ('Do you really want to logout ?');"> Logout </a>
       &nbsp;&nbsp;&nbsp;


       <p class="text-right">
          <?php echo date("l, d M"); ?>
       </p>

    </div>

    <div class="div">
      <div class="col-lg-12">
          <div class="analysis">
            <?php
              
              $users = mysql_query("SELECT * FROM `circle` ");
              $count_users = mysql_num_rows($users);

              $cmp = mysql_query("SELECT * FROM `cmp_log` where cmp_log.ref_no in (select stats.ref_no from `stats` where status not in (0,4))");
              $count_cmp = mysql_num_rows($cmp);

              $frd = mysql_query("SELECT * FROM `stats` where status=($aid+1)");
              $count_frd = mysql_num_rows($frd);
            ?>

            <div class="track theme">
                Total Users <br> <br><p><?php echo $count_users;?></p>
            </div>

            <!-- <div class="track vio">
                Total Engineers <br> <p><?php echo $count_engi;?></p>
            </div> -->

            <div class="track red">
                Active Complaint <br> <br><p><?php echo $count_cmp;?></p>
            </div>
          <?php 
          if($aid!=3){
            echo "<div class='track blue'>Forwarded <br> <br><p> $count_frd</p></div>";
          }
          ?>
          </div>



          </div> 
      </div>

    </div>


  </div>


    <!-- <footer>
    <br><br>&copy <?php echo date("Y"); ?> <?php echo $web_name; ?>
    </footer> -->
    <?php
      include 'footer2.php';
      ?>

    <script src="../files/js/jquery.js"></script>
    <script src="../files/js/bootstrap.min.js"></script>
    <script src="../files/js/script.js"></script>


  </body>
</html>

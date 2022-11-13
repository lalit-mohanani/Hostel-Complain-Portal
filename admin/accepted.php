<?php
  require '../core/session.php';
  // require '../core/config.php';
  require '../core/admin-key.php';
 ?>
<?php $filter=$_GET['fil']; $coi=$_GET['coi']; $at=$_GET['at'];?>
<?php 
   $username=$_SESSION['username'];
   $query1=mysql_query("SELECT * FROM admin WHERE username='$username'"); 
   $arry1=mysql_fetch_array($query1); 
   $aid=$arry1['id'];
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Hostel Management Portal  </title>
    <link rel="shortcut icon" href="../files/img/hm12.jpg">
    <link rel="stylesheet" href="../files/css/bootstrap.css">
    <link rel="stylesheet" href="../files/css/custom.css">

  </head>
  <body>

  <?php require 'nav.php'; ?>
  <div class="animated fadeIn">


  <div class="cover main">
    <h1>Rejected</h1>
  </div>

    <div class="div">
        <div class="col-lg-12 ">
          <?php
            if(empty($filter) && empty($coi) && empty($at)){$result = mysql_query("SELECT * FROM `cmp_log` where cmp_log.ref_no in (select stats.ref_no from `stats` where status in ($aid))");}
            else if(!empty($filter)){$result = mysql_query("SELECT * FROM `cmp_log` where nameOfHostel='$filter' AND cmp_log.ref_no in (select stats.ref_no from `stats` where status in ($aid))");}  
            else if(!empty($coi)){$result = mysql_query("SELECT * FROM `cmp_log` where CategoryOfIssue='$coi' and cmp_log.ref_no in (select stats.ref_no from `stats` where status in ($aid))");}
            else{$result = mysql_query("SELECT * FROM `cmp_log` where availability='$at' and cmp_log.ref_no in (select stats.ref_no from `stats` where status in ($aid))");}
            $num_rows = mysql_num_rows($result);
          ?>
              <div class='admin-data'>
                Total Complaints
                <span class='button view' href=''><?php echo "$num_rows";?></a>
              </div>
              <br><br><br><br>
              <br><br>
              <br>

              <div class="container" style="margin-left:15px;">
                <div class="dropdown">
                 <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown" style="background-color:#4db6ac;color:#FFFFFF ;padding-right: 30px;padding-left: 30px; padding-top: 10px;padding-bottom: 10px; font-size: larger; font-weight: bold;
                 -webkit-box-shadow: 3px 3px 9px 0px rgba(0,0,0,0.25);
-moz-box-shadow: 3px 3px 9px 0px rgba(0,0,0,0.25);
box-shadow: 3px 3px 9px 0px rgba(0,0,0,0.25);">Filter
                   <span class="caret"></span></button>
                 <ul class="dropdown-menu">
                  <li class="dropdown-submenu">
                    <a class="test" tabindex="-1" href="#">Hostel Name <span class="caret"></span></a>
                  <ul class="dropdown-menu">
                    <li><a tabindex="-1" href="?fil=MHR">MHR</a></li>
                    <li><a tabindex="-1" href="?fil=BHR">BHR</a></li>
                    <li><a tabindex="-1" href="?fil=RHR">RHR</a></li>
                    <li><a tabindex="-1" href="?fil=SHR">SHR</a></li>
                    <li><a tabindex="-1" href="?fil=GHR">GHR</a></li>
                  </ul>
                  </li>
                  <li class="dropdown-submenu">
                   <a class="test" tabindex="-1" href="#">Category of Issue <span class="caret"></span></a>
                   <ul class="dropdown-menu">
                    <li><a tabindex="-1" href="?coi=Cleanliness">Cleanliness</a></li>
                    <li><a tabindex="-1" href="?coi=Electricity">Electricity</a></li>
                    <li><a tabindex="-1" href="?coi=Broken Items">Broken Items</a></li>
                    <li><a tabindex="-1" href="?coi=Internet Issue">Internet Issue</a></li>
                    <li><a tabindex="-1" href="?coi=Food">Food</a></li>
                    <li><a tabindex="-1" href="?coi=Other">Other</a></li>
                   </ul>
                  </li>
                  <li class="dropdown-submenu">
                   <a class="test" tabindex="-1" href="#">Availability <span class="caret"></span></a>
                   <ul class="dropdown-menu">
                    <li><a tabindex="-1" href="?at=Morning (6:00 - 11:59)">Morning (6:00 - 11:59)</a></li>
                    <li><a tabindex="-1" href="?at=Afternoon (12:00 - 16:00)">Afternoon (12:00 - 16:00)</a></li>
                    <li><a tabindex="-1" href="?at=Evening (16:00 - 20:00)">Evening (16:00 - 20:00)</a></li>
                    <li><a tabindex="-1" href="?at=Night (20:00 - 00:00)">Night (20:00 - 00:00)</a></li>
                   </ul>
                  </li>
                 </ul>
                </div>
               </div>

              <br>
              <h2 class="text-center"><?php echo $message; ?></h2>
              <br><br>

              <ol style="color:darkcyan;">
          <?php

            while($data=mysql_fetch_array($result)) {
            //echo"<div class='admin-data'>";
            echo "<li class='admin-data' style='width:500px;'>";
            echo $data['name'];
            $empty=$data['name'];
            echo "<a class='button view' href='message-view.php?ref=$data[ref_no]'>View</a>";
            //echo "</div>";
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

    <script src="../files/js/jquery.js"></script>
    <script src="../files/js/bootstrap.min.js"></script>
    <script src="../files/js/script.js"></script>

    <script>$(document).ready(function() {
     $(".dropdown-submenu a.test").on("click", function(e) {
      $(this)
       .next("ul")
       .toggle();
      e.stopPropagation();
      e.preventDefault();
     });
    });
    </script>               

  </body>
</html>

<?php
  require './core/session.php';
  require './core/config.php';
  require './core/user_key.php';

  $ref = $_GET['ref'];
	$result = mysql_query("SELECT * FROM `cmp_log` WHERE ref_no='$ref'");
	$arry = mysql_fetch_array($result);
	if (!$result) {
			die("Error: Data not found..");
		}
 ?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Hostel Management Portal  </title>
    <link rel="shortcut icon" href="./files/img/hm12.jpg">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <!-- <link rel="stylesheet" href="./files/css/bootstrap.css"> -->
    <link rel="stylesheet" href="./files/css/custom.css">
  </head>
  <body>
  

  <div class="animated fadeIn">


  <div class="cover user text-center" style="height:120px;">
      <br>
      <h2>Complaint</h2>
    </div>

  <?php require 'nav-profile.php';?>
                  <div class="panel-body" style="text-align:center;">
                      <h2>Status : &nbsp;&nbsp;&nbsp;&nbsp;<?php 
                      $query2=mysql_query("SELECT * FROM `stats` WHERE ref_no='$ref'");
                      while( $arry2=mysql_fetch_array($query2) ) {
                        $status=$arry2['status'];
                      }
                      if($status==0){echo "Rejected";}
                      if($status==1){echo "Pending at Officer 1";}
                      if($status==2){echo "Pending at Officer 2";}
                      if($status==3){echo "Pending at Officer 3";}
                      if($status==4){echo "Resolved";}
                      echo"<p><span class='error'>".$error."</p></span>";
                      echo "<p><span class='message'>".$message."</p></span>";
                      ?></h2>
                  </div>
              

    <div class="div">
        <div class="col-lg-12 ">
           <!-- <?php
          echo "<a class='button logout' style='background-color: rgb(62, 179, 153);border-radius: 5px;margin-right: 8px;' href ='m_accept.php?id=$id' onClick=\"javascript:return confirm ('Confirm Acceptance');\">Accept</a>";
           ?>

          <?php
          echo "<a class='button logout' style='background-color: rgb(62, 179, 153);border-radius: 5px;margin-right: 8px;' href ='m_reject.php?id=$id' onClick=\"javascript:return confirm ('Confirm Rejection');\">Reject</a>";
           ?>

          <?php
          echo "<a class='button logout' style='background-color: #116ba7;border-radius: 5px;' href ='m_escalate.php?id=$id' onClick=\"javascript:return confirm ('Do you really want to escalate ?');\">Escalate</a>";
           ?> -->

           <br><br><br><br>
           <table>
          <?php
            $query1=mysql_query("SELECT * FROM `cmp_log` WHERE ref_no='$ref'");
            while( $arry=mysql_fetch_array($query1) ) {

              $id = $arry['id'];
              $name = $arry['name'];
              $email = $arry['email'];
              $phone_no = $arry['phone no'];
              $hostelname = $arry['nameOfHostel'];
              $complain = $arry['complain'];
              $avail = $arry['availability'];
              $ref = $arry['ref_no'];
              $coi = $arry['CategoryOfIssue'];
              $room=$arry['address'];
            }

               echo "<tr> <td> <b> Refference no. </b> </td>";
               echo "     <td> ".$ref."</td> </tr>";

               echo "<tr> <td> <b> Name of Hostel </b> </td>";
               echo "     <td> ".$hostelname."</td> </tr>";

               echo "<tr> <td> <b> Category of Issue </b> </td>";
               echo "     <td> ".$coi."</td> </tr>";

               echo "<tr> <td> <b> Name </b> </td>";
               echo "     <td> ".$name."</td> </tr>";

               echo "<tr> <td> <b> Room Number </b> </td>";
               echo "     <td> ".$room."</td> </tr>";

               echo "<tr> <td> <b> Contact Number* </b> </td>";
               echo "     <td> ".$phone_no."</td> </tr>";

               echo "<tr> <td> <b> Email ID </b> </td>";
               echo "     <td> ".$email."</td> </tr>";

               echo "<tr> <td> <b> Availability Time </b> </td>";
               echo "     <td> ".$avail."</td> </tr>";

               echo "<tr> <td> <b> Complain </b> </td>";
               echo "     <td> ".$complain."</td> </tr>";

          ?>
          </table>



          
          <br><br>

      </div>
    </div>
  </div>


  <?php
      include 'footer2.php';
      ?>
    <script src="./files/js/jquery.js"></script>
    <script src="./files/js/bootstrap.min.js"></script>
    <script src="./files/js/script.js"></script>

  </body>
</html>

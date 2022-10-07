<?php
require './core/session.php';
require './core/config1.php';
require 'core/redirect.php';
// require './core/user_key.php';

$ref = $_GET['ref'];
	$result = mysqli_query($conn,"SELECT * FROM `cmp_log` WHERE ref_no='$ref'");
	$arry = mysqli_fetch_array($result);
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
  <title>Hostel Management Portal </title>
  <link rel="shortcut icon" href="./files/img/hm12.jpg">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  <!-- <link rel="stylesheet" href="./files/css/bootstrap.css"> -->
  <link rel="stylesheet" href="./files/css/custom.css">
  <style>
    td {
      padding-left: 10px;
    }
  </style>
</head>

<body>


  <div class="animated fadeIn">


    <div class="cover user text-center" style="height:120px;">
      <br>
      <h2>Complaint</h2>
    </div>

    <?php require 'nav-profile.php'; ?>
    <div class="panel-body" style="text-align:center;">
      <h2>Status : &nbsp;&nbsp;&nbsp;&nbsp;
        <?php
        $query2=mysqli_query($conn,"SELECT * FROM `stats` WHERE ref_no='$ref'");
        while( $arry2=mysqli_fetch_array($query2) ) {
          $status=$arry2['status'];
        }
        if($status==0){echo "Rejected";}
        if($status==1){echo "Pending at Officer 1";}
        if($status==2){echo "Pending at Officer 2";}
        if($status==3){echo "Pending at Officer 3";}
        if($status==4){echo "Resolved";}
        echo"<p><span class='error'>".$error."</p></span>";
        echo "<p><span class='message'>".$message."</p></span>";
        ?>
      </h2>
    </div>


    <div class="col-md-auto">
      <div class="col-lg-12 " style="padding-left:5px;padding-right:5px">

        <br><br><br><br>
        <table>
          <?php
          $query1=mysqli_query($conn,"SELECT * FROM `cmp_log` WHERE ref_no='$ref'");
          while( $arry=mysqli_fetch_array($query1) ) {

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
            $vi=$arry['visibility'];
          }
        

          echo "<tr> <td> <b> Refference no. </b> </td>";
          echo "     <td> " . $ref . "</td> </tr>";

          echo "<tr> <td> <b> Name of Hostel </b> </td>";
          echo "     <td> " . $hostelname . "</td> </tr>";

          echo "<tr> <td> <b> Category of Issue </b> </td>";
          echo "     <td> " . $coi . "</td> </tr>";

          echo "<tr> <td> <b> Name </b> </td>";
          echo "     <td> " . $name . "</td> </tr>";

          echo "<tr> <td> <b> Room Number </b> </td>";
          echo "     <td> " . $room . "</td> </tr>";

          echo "<tr> <td> <b> Contact Number* </b> </td>";
          echo "     <td> " . $phone_no . "</td> </tr>";

          echo "<tr> <td> <b> Email ID </b> </td>";
          echo "     <td> " . $email . "</td> </tr>";

          echo "<tr> <td> <b> Availability Time </b> </td>";
          echo "     <td> " . $avail . "</td> </tr>";

          echo "<tr> <td> <b> Visibility </b> </td>";
          echo "     <td style='color: ";
           if($vi=="private"){echo "red";}
           if($vi=="public"){echo "green";}
          
           echo "'> " . $vi. "</td> </tr>";

          echo "<tr> <td> <b> Complain </b> </td>";
          echo "     <td> " . $complain . "</td> </tr>";

          echo "<tr> <td> <b> Remarks by Warden </b> </td>";
          echo "     <td > " . $remarks . "</td> </tr>";

          ?>
        </table>




        <br><br>

      </div>
    </div>
  </div>


  <!-- <?php
  include 'footer2.php';
  ?> -->
  <script src="./files/js/jquery.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
  <script src="./files/js/script.js"></script>

</body>

</html>
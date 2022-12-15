<?php
require './core/session.php';
require './core/config1.php';
require 'core/redirect.php';
// require './core/user_key.php';

$ref = $_GET['ref'];
$result = mysqli_query($conn, "SELECT * FROM `cmp_log` WHERE ref_no='$ref'");
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
        $query2 = mysqli_query($conn, "SELECT * FROM `stats` WHERE ref_no='$ref'");
        while ($arry2 = mysqli_fetch_array($query2)) {
          $status = $arry2['status'];
        }
        if ($status == 0) {
          echo "Rejected";
        }
        if ($status == 1) {
          echo "Pending at Hall Office";
        }
        if ($status == 2) {
          echo "Pending at Warden/Assistant Warden";
        }
        if ($status == 3) {
          echo "Pending at Chief Warden";
        }
        if ($status == 4) {
          echo "Resolved";
        }
        echo "<p><span class='error'>" . $error . "</p></span>";
        $query = mysqli_query($conn, "SELECT * FROM `cmp_log` WHERE ref_no='$ref'");
        while ($arr = mysqli_fetch_array($query)) {
          $visi = $arr['visibility'];
        }
        $user_email=$_SESSION['email'];

        $query_upvotes = mysqli_query($conn, "SELECT COUNT(*) as count FROM `upvotes` WHERE (cmp_refnc='$ref' AND user_email='$user_email')");

        $data1=mysqli_fetch_assoc($query_upvotes);

        if ($status != 4 && $visi == 'Public'){ 
          if($data1['count'] < 1) {
          // if($status !=4){$data=mysql_fetch_assoc($result);
          // echo "<button type='button' class='btn btn-primary' style='background-color: #0ea798' href='upvote.php?ref=$ref' onClick=\"javascript:return confirm ('Confirm Upvote');\">Upvote</button>";
          echo "<a class='btn btn-primary' style='background-color: #0ea798; color: white;' href='upvote.php?ref=$ref' onClick=\"javascript:return confirm ('Confirm Upvote');\">Upvote</a>";
        }
        else {
          echo "<span style='font-size: 17px; color: #ccc;'>You have already upvoted</span>";
        }
      }
        echo "<p><span class='message'>" . $message . "</p></span>";
        ?>
      </h2>
    </div>


    <div class="col-md-auto">
      <div class="col-lg-12 " style="padding-left:5px;padding-right:5px">

        <br><br><br>
        <table>
          <?php
          $query1 = mysqli_query($conn, "SELECT * FROM `cmp_log` WHERE ref_no='$ref'");
          while ($arry = mysqli_fetch_array($query1)) {

            $id = $arry['id'];
            $name = $arry['name'];
            $email = $arry['email'];
            $phone_no = $arry['phone no'];
            $hostelname = $arry['nameOfHostel'];
            $complain = $arry['complain'];
            $avail = $arry['availability'];
            $ref = $arry['ref_no'];
            $coi = $arry['CategoryOfIssue'];
            $room = $arry['address'];
            $vi = $arry['visibility'];
            $remarks = $arry['remark'];
          }


          echo "<tr> <td> <span style='color:black'> Refference no. </span> </td>";
          echo "     <td> " . $ref . "</td> </tr>";

          echo "<tr> <td> <span style='color:black'> Name of Hostel </span> </td>";
          echo "     <td> " . $hostelname . "</td> </tr>";

          echo "<tr> <td> <span style='color:black'> Category of Issue </span> </td>";
          echo "     <td> " . $coi . "</td> </tr>";

          echo "<tr> <td> <span style='color:black'> Name </span> </td>";
          echo "     <td> " . $name . "</td> </tr>";

          echo "<tr> <td> <span style='color:black'> Room Number </span> </td>";
          echo "     <td> " . $room . "</td> </tr>";

          echo "<tr> <td> <span style='color:black'> Contact Number* </span> </td>";
          echo "     <td> " . $phone_no . "</td> </tr>";

          echo "<tr> <td> <span style='color:black'> Email ID </span> </td>";
          echo "     <td> " . $email . "</td> </tr>";

          echo "<tr> <td> <span style='color:black'> Availability Time </span> </td>";
          echo "     <td> " . $avail . "</td> </tr>";

          echo "<tr> <td> <span style='color:black'> Visibility </span> </td>";
          echo "     <td style='color: ";
          //  if($vi=="private"){echo "red";}
          //  if($vi=="public"){echo "green";}

          echo "'> " . $vi . "</td> </tr>";

          echo "<tr> <td> <span style='color:black'> Complain </span> </td>";
          echo "     <td> " . $complain . "</td> </tr>";

          echo "<tr> <td> <span style='color:black'> Remarks by Warden </span> </td>";
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
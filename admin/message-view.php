<?php
require '../core/session.php';
require '../core/config1.php';
require '../core/admin-key.php';

$ref = $_GET['ref'];
$result = mysqli_query($conn, "SELECT * FROM `cmp_log` WHERE ref_no='$ref'");
$arry = mysqli_fetch_array($result);
if (!$result) {
  die("Error: Data not found..");
}
?>
<?php
$username = $_SESSION['username'];
$query1 = mysqli_query($conn, "SELECT * FROM admin WHERE username='$username'");
$arry1 = mysqli_fetch_array($query1);
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
              <h1>Complaint</h1>
            </div style="margin-bottom :300px ;">
            <div class="col-md-auto">
              <div class="col-lg-12 " style="padding-left:15px">
                <?php
                echo "<a class='button logout' style='background-color: rgb(62, 179, 153);border-radius: 5px;margin-right: 8px;' href ='m_accept.php?ref=$ref' onClick=\"javascript:return confirm ('Confirm Acceptance');\">Accept</a>";
                ?>

                <?php
                echo "<a class='button logout' style='background-color: rgb(62, 179, 153);border-radius: 5px;margin-right: 8px;' href ='m_reject.php?ref=$ref' onClick=\"javascript:return confirm ('Confirm Rejection');\">Reject</a>";
                ?>

                <?php
                if ($aid != 3) {
                  echo "<a class='button logout' style='background-color: #116ba7;border-radius: 5px;' href ='m_escalate.php?ref=$ref' onClick=\"javascript:return confirm ('Do you really want to escalate ?');\">Escalate</a>";
                }
                ?>

                <br><br><br><br>
                <table>
                  <?php
                  $query1 = mysqli_query($conn, "SELECT * FROM `cmp_log` WHERE ref_no='$ref'");
                  while ($arry = mysqli_fetch_array($query1)) {

                    $id = $arry['id'];

                    $name = $arry['name'];

                    $email = $arry['email'];
                    $phone_no = $arry['phone no'];

                    $complain = $arry['complain'];
                    $category = $arry['CategoryOfIssue'];
                    $noh = $arry['nameOfHostel'];
                    $avai = $arry['availability'];
                    $ref = $arry['ref_no'];
                    $address = $arry['address'];
                  }


                  echo "<tr> <td style='border-radius:10px'> <b> Refference no. </b> </td>";
                  echo "     <td> " . $ref . "</td> </tr>";

                  echo "<tr> <td> <b> Name of Hostel </b> </td>";
                  echo "     <td> " . $noh . "</td> </tr>";

                  echo "<tr> <td> <b> Category of Issue </b> </td>";
                  echo "     <td> " . $category . "</td> </tr>";

                  echo "<tr> <td> <b> Room Number </b> </td>";
                  echo "     <td> " . $address . "</td> </tr>";

                  echo "<tr> <td> <b> Contact Number* </b> </td>";
                  echo "     <td> " . $phone_no . "</td> </tr>";

                  echo "<tr> <td> <b> Email ID </b> </td>";
                  echo "     <td> " . $email . "</td> </tr>";

                  //  echo "<tr> <td> <b> Roll Number </b> </td>";
                  //  echo "     <td> ".$rollno."</td> </tr>";

                  echo "<tr> <td> <b> Availability Time </b> </td>";
                  echo "     <td> " . $avai . "</td> </tr>";

                  echo "<tr> <td> <b> Visibility </b> </td>";
                  echo "     <td> " . $visibility . "</td> </tr>";

                  echo "<tr> <td> <b> Complain </b> </td>";
                  echo "     <td> " . $complain . "</td> </tr>";

                  //  echo "<tr> <td> <b> Remarks </b> </td>";
                  //  echo '     <td style="text-align:right"><textarea class="form-control" name="complain" style="height: 100px" placeholder="Your Remark..." id="floatingTextarea"></textarea><button type="submit" class="log" style="margin-top:8px;width:100px">Send</button></td> </tr>';
                  ?>
                </table>
                <br><br>

                <div class="input-group mb-3" style="padding-right:10px">
                  <input type="text" class="form-control" placeholder="Your Remark..." aria-label="Your Remark..." aria-describedby="button-addon2" style="height:70px">
                  <button class="btn btn-outline-secondary" type="button" id="button-addon2" style="background-color:#37474f">Send</button>
                </div>


                <br><br>

              </div>
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
  <script src="../files/js/script.js"></script>

</body>

</html>
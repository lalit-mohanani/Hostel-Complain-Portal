<?php
require '../core/session.php';
require '../core/dbconfig.php';
require '../core/admin-key.php';

session_start();
$ref = $_GET['ref'];
$result = mysqli_query($conn, "SELECT * FROM `cmp_log` WHERE ref_no='$ref'");
$arry = mysqli_fetch_array($result);
if (!$result) {
  die("Error: Data not found..");
}

?>
<?php
$username = $_SESSION['name'] . " " . $_SESSION['user_last_name'];
$email = $_SESSION['email'];
$query1 = mysqli_query($conn, "SELECT * FROM admin WHERE email='$email'");
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
  <style>
    li {
      font-size: 21px;
    }
    
    .button{
  position: relative;
  top: 20px;
  padding: 12px 16px;
  color: #fff;
  border-radius: 5px;
  box-shadow: 0 2px 5px rgba(0,0,0,.26);
  font-size: 18px;
     }
     
     .logou{
  /* border: 1px solid #fff; */
    background:#e23c39;
}
.logou:hover{
  background: #cf1815;
}
.accept{
  /* border: 1px solid #fff; */
    background:#3eb399;
}
.accept:hover{
  background: #308875;
}
.escalate{
  /* border: 1px solid #fff; */
    background:#116ba7;
}
.escalate:hover{
  background: #106299;
}

    .ARE_btns {
      display: flex;
      justify-content: left;
      align-items: center;
      margin-top: 260px;
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

            <div class="cover main" style="display: flex;
    align-items: center;
    justify-content: center;">
              <h1>Complaint</h1>
            </div style="margin-bottom :300px ;">
            <div class="col-md-auto">
              <div class="col-lg-12 " style="padding-left:15px">
              <div class="ARE_btns">
                <?php
                echo "<a class='button accept' style='margin-right: 8px; color: white;' href ='m_accept.php?ref=$ref' onClick=\"javascript:return confirm ('Confirm Acceptance');\">Accept</a>";
                ?>
                <?php
                echo "<a class='button logou' style='margin-right: 8px;color: white;' href ='m_reject.php?ref=$ref' onClick=\"javascript:return confirm ('Confirm Rejection');\">Reject</a>";
                ?>
               
                <?php
                if ($aid != 3) {
                  echo "<a class='button escalate' style='color: white' href ='m_escalate.php?ref=$ref' onClick=\"javascript:return confirm ('Do you really want to escalate ?');\">Escalate</a>";
                }
                ?>
              </div>

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
                    $vi = $arry['visibility'];
                  }

                  $remark = mysqli_real_escape_string($conn, $_POST['remark']);
                  if (empty($remark)) {
                    //  $message = "Please fill all details!";
                  } else {
                    mysqli_query($conn, "UPDATE `cmp_log` SET remark='$remark' WHERE ref_no='$ref'") or die(mysqli_error($conn));
                  }

                  echo "<tr> <td> <span style='color:black'> Refference no. </span> </td>";
                  echo "     <td> " . $ref . "</td> </tr>";

                  echo "<tr> <td> <span style='color:black'> Name of Hostel </span> </td>";
                  echo "     <td> " . $noh . "</td> </tr>";

                  echo "<tr> <td> <span style='color:black'> Category of Issue </span> </td>";
                  echo "     <td> " . $category . "</td> </tr>";

                  echo "<tr> <td> <span style='color:black'> Name </span> </td>";
                  echo "     <td> " . $name . "</td> </tr>";

                  echo "<tr> <td> <span style='color:black'> Room Number </span> </td>";
                  echo "     <td> " . $address . "</td> </tr>";

                  echo "<tr> <td> <span style='color:black'> Contact Number* </span> </td>";
                  echo "     <td> " . $phone_no . "</td> </tr>";

                  echo "<tr> <td> <span style='color:black'> Email ID </span> </td>";
                  echo "     <td> " . $email . "</td> </tr>";

                  //  echo "<tr> <td> <b> Roll Number </b> </td>";
                  //  echo "     <td> ".$rollno."</td> </tr>";

                  echo "<tr> <td> <span style='color:black'> Availability Time </span> </td>";
                  echo "     <td> " . $avai . "</td> </tr>";

                  echo "<tr> <td> <span style='color:black'> Visibility </span> </td>";
                  echo "     <td> " . $vi . "</td> </tr>";

                  echo "<tr> <td> <span style='color:black'> Complain </span> </td>";
                  echo "     <td> " . $complain . "</td> </tr>";

                  //  echo "<tr> <td> <b> Remarks </b> </td>";
                  //  echo '     <td style="text-align:right"><textarea class="form-control" name="complain" style="height: 100px" placeholder="Your Remark..." id="floatingTextarea"></textarea><button type="submit" class="log" style="margin-top:8px;width:100px">Send</button></td> </tr>';
                  ?>
                </table>
                <br><br>

                <form class="input-group mb-3" method="post" style="padding-right:10px">
                  <input type="text" name="remark" class="form-control" placeholder="Your Remark..." aria-label="Your Remark..." aria-describedby="button-addon2" style="height:70px">
                  <button class="btn btn-outline-secondary" type="submit" id="button-addon2" style="background-color:#37474f">Send</button>
                </form>


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
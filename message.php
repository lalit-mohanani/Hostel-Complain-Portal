<?php
require 'core/session.php';
require 'core/config1.php';
require 'core/redirect.php';
//for session
$session = $_SESSION['email'];
$ref = rand(3858558, 100000);
$error = "";
$message = "";
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Hostel Management Portal </title>
  <link rel="shortcut icon" href="files/img/hm12.jpg">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  <!-- <link rel="stylesheet" href="files/css/bootstrap.css"> -->
  <link rel="stylesheet" href="files/css/custom.css">
  <style media="screen">
    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
      -webkit-appearance: none;
      margin: 0;
    }

    input[type=number] {
      -moz-appearance: textfield;
    }

    table {
      border: 0px;
    }

    td {
      padding: 10px;
      border-top: 0px solid #eee;
      border-bottom: 0px solid #eee !important;
      padding-left: 0px;
      color: #0ea798;
    }

    input,
    button.log {
      width: 100px;
      border-radius: 5px;
    }

    .reset-style,
    .reset-style * {
      all: revert;
    }
  </style>
</head>

<body>
  <div class="animated fadeIn">
    <div class="cover user text-center" style="height:120px;">
      <br>
      <h2>Add Complaints</h2>
    </div>
    <?php require 'nav-profile.php'; ?>
    <!-- <div class="animated fadeIn"> -->
    <div class="col-lg-12 text-center">
      <div class="col-md-auto">
        <?php
        $query1 = mysqli_query($conn,"SELECT max(id) as id FROM `cmp_log` ");
        while ($arry = mysqli_fetch_array($query1)) {
          $id = $arry['id'];
        }
        $rollno=substr($_SESSION['email'],0,9);
        $name=$_SESSION['name']." ".$_SESSION['user_last_name'];
        $email = $_SESSION['email'];
             if(empty($_REQUEST)===false){
              
               $phoneno =mysqli_real_escape_string($conn,$_POST['phoneno']);

               $complain = mysqli_real_escape_string($conn,$_POST['complain']);
               $CategoryOfIssue=mysqli_real_escape_string($conn,$_POST['CategoryOfIssue']);
               $nameOfHostel=mysqli_real_escape_string($conn,$_POST['nameOfHostel']);
               $address=mysqli_real_escape_string($conn,$_POST['address']);
               $availability=mysqli_real_escape_string($conn,$_POST['availability']);
               $visibility=mysqli_real_escape_string($conn,$_POST['visibility']);
               if(empty($phoneno) || empty($complain) || empty($CategoryOfIssue || empty($address))){
                // $message = "Please fill all details!";
              }else
              if (!preg_match("/^[0-9]*$/",$phoneno)) {
                $error = "Invalid Phone Number";
              }else{
                  $id++;
                 mysqli_query($conn,"INSERT INTO `cmp_log` VALUES ('$id','$name','$email','$phoneno','$complain','$ref','$nameOfHostel','$CategoryOfIssue','$address','$availability','$visibility')") or die(mysqli_error($conn));
                 mysqli_query($conn,"INSERT INTO `stats` VALUES ('$ref',1,NOW())");
                 $message = "Your Complain has been Registerd";
                 }
             }
        ?>
        <form class="" method="post" autocomplete="off">
          <div class="container">
            <div class="panel panel-default">
              <div class="panel-body">
                <h2>Your Reference no : &nbsp;&nbsp;&nbsp;&nbsp;<?php echo $ref;
                                                                echo "<p><span class='error'>" . $error . "</p></span>";
                                                                echo "<p><span class='message'>" . $message . "</p></span>";
                                                                ?></h2>
              </div>
            </div>
            <table style="width:90%">

              <tr>
                <td class="text-left ">Name of Hostel</td>
                <td>
                  <!-- <input type = "text" name="nameOfHostel" style="text-align:center;"> -->
                  <!-- <input list="namesOfHostel" name="nameOfHostel" style="text-align:center;"/> -->
                  <select class="form-select shadow-none" id="inputGroupSelect02" name="nameOfHostel" style="width:100%">
                    <!-- <datalist id="namesOfHostel"> -->
                    <option selected>Choose...</option>
                    <option value="MHR">MHR</option>
                    <option value="BHR">BHR</option>
                    <option value="RHR">RHR</option>
                    <option value="SHR">SHR</option>
                    <option value="GHR">GHR</option>
                  </select>
                </td>
              </tr>
              <tr>

                <td class="text-left">Category of Issue</td>
                <td>
                  <select class="form-select" id="inputGroupSelect02" name="CategoryOfIssue" style="width:100%">
                    <option selected>Choose...</option>
                    <option value="Cleanliness">Cleanliness</option>
                    <option value="Electricity">Electricity</option>
                    <option value="Broken Items">Broken Items</option>
                    <option value="Internet Issue">Internet Issue</option>
                    <option value="Food">Food</option>
                    <option value="Other">Other</option>
                  </select>
                </td>
              </tr>
              <tr>
                <td class="text-left">Name</td>
                <td class="text-left">
                  <div class="form-control" style="width:100%; text-align:left"><?php echo $name; ?></div>
                </td>
              </tr>
              <tr>
                <td class="text-left">Room Number</td>
                <td><input type="text" class="form-control shadow-none" name="address" placeholder="Block-Room No." aria-label="Username" aria-describedby="addon-wrapping" style="width:100%"></td>
                <!-- <td><input type = "text" name = "address" style="text-align:center;">  </td> -->
              </tr>
              <tr>
                <td class="text-left">Contact Number *</td>
                <td><input type="number" class="form-control shadow-none" name="phoneno" maxlength=10 placeholder="10-digit No." aria-label="Username" aria-describedby="addon-wrapping" style="width:100%"></td>
                <!-- <td><input type = "number" name = "phoneno" maxlength=10 style="text-align:center;">  </td> -->
              </tr>
              <tr>
                <td class="text-left">Your Email ID</td>
                <td class="text-left">
                  <div class="form-control" style="width:100%; text-align:left"><?php echo $_SESSION['email']; ?></div>
                </td>
              </tr>
              <tr>
                <td class="text-left">Roll Number</td>
                <td class="text-left">
                  <div class="form-control" style="width:100%; text-align:left"><?php echo $rollno; ?></div>
                </td>
              </tr>
              <tr>
                <td class="text-left">Availability (Time)</td>
                <td>
                  <select class="form-select" id="inputGroupSelect02" name="availability" style="width:100%">
                    <option selected>Choose...</option>
                    <option value="Morning (6:00 - 11:59)">Morning (6:00 - 11:59)</option>
                    <option value="Afternoon (12:00 - 16:00)">Afternoon (12:00 - 16:00)</option>
                    <option value="Evening (16:00 - 20:00)">Evening (16:00 - 20:00)</option>
                    <option value="Night (20:00 - 00:00)">Night (20:00 - 00:00)</option>
                  </select>
                </td>
              </tr>

              <tr>
                <td>Visibility</td>
                <td>
                  <fieldset class="row mb-3">
                    <div class="col-sm-10">
                      <div class="form-check form-check-inline" style="float:left;color:black">
                        <input class="form-check-input" type="radio" name="visibility" id="gridRadios1" value="Public" checked>
                        <label class="form-check-label" for="gridRadios1">
                          Public
                        </label>
                      </div>
                      <div class="form-check form-check-inline" style="float:left;color:black">
                        <input class="form-check-input" type="radio" name="visibility" id="gridRadios2" value="Private">
                        <label class="form-check-label" for="gridRadios2">
                          Private
                        </label>
                      </div>
                    </div>
                  </fieldset>
                </td>
              </tr>
              <tr>
                <td class="text-left">Your Complain *</td>
                <td><textarea class="form-control" name="complain" rows="8" cols="80" placeholder="Your complain..." id="floatingTextarea" style="width:100%"></textarea></td>
              </tr>
              <tr>
                <td></td>
                <td></td>
              </tr>
              <tr>
                <td></td>
                <td><button type="submit" class="log">Submit</button></td>
              </tr>
            </table>
          </div>
        </form>
      </div>
    </div>
  </div>
  <!-- </div>
  </div> -->
  <?php
  include 'footer2.php';
  ?>
  <script src="files/js/jquery.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
  <script src="files/js/script.js"></script>
</body>

</html>
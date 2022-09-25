
<?php
    require 'core/session.php';
    require 'core/config.php';
    include 'core/user_key.php';
    //for session
    $session=$_SESSION['email'];
    $ref = rand (3858558,100000);$error = "";$message = "";
 ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Hostel Management Portal  </title>
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
    table{border: 0px;}
    td{
      padding:10px;
      border-top: 0px solid #eee;
      border-bottom: 0px solid #eee!important;
      padding-left: 0px;
      color:#0ea798;
    }
    input,button.log{width: 100px;border-radius: 5px;}
    </style>
  </head>
  <body>
    <div class="cover user text-center" style="height:120px;">
      <br>
      <h2>Add Complaints</h2>
    </div>
    <?php require 'nav-profile.php'; ?>
    <div class="animated fadeIn">
      <div class="padd">
        <div class="col-lg-12 text-center">
          <?php
            $query1=mysql_query("SELECT * FROM `circle` WHERE email LIKE '%$session%'");
            while( $arry=mysql_fetch_array($query1) ) {
              $id=$arry['id'];
              $rollno=$arry['rollno'];
              $name=$arry['name'];
              $email = $arry['email'];
                 }
                   if(empty($_POST)===false){
                     $phoneno =mysql_real_escape_string($_POST['phoneno']);
      
                     $complain = mysql_real_escape_string($_POST['complain']);
                     $CategoryOfIssue=mysql_real_escape_string($_POST['CategoryOfIssue']);
                     $nameOfHostel=mysql_real_escape_string($_POST['nameOfHostel']);
                     $address=mysql_real_escape_string($_POST['address']);
                     $availability=mysql_real_escape_string($_POST['availability']);
                     if(empty($phoneno) || empty($complain) || empty($CategoryOfIssue || empty($address))){

                     }else
                     if (!preg_match("/^[0-9]*$/",$phoneno)) {
                       $error = "Invalid Phone Number";
                     }else{
                       mysql_query("INSERT INTO `cmp_log` VALUES ('$id','$name','$email','$phoneno','$complain','$ref','$nameOfHostel','$CategoryOfIssue','$address','$availability')") or die(mysql_error());
                       mysql_query("INSERT INTO `stats` VALUES ('$ref',1,NOW())");
                       $message = "Your Complain has been Registerd";
                       }
                   }
              ?>
          <form class="" method="post" autocomplete="off">
            <div class="container">
              <div class="panel panel-default">
                  <div class="panel-body">
                      <h2>Your Reference no : &nbsp;&nbsp;&nbsp;&nbsp;<?php echo $ref;
                      echo"<p><span class='error'>".$error."</p></span>";
                      echo "<p><span class='message'>".$message."</p></span>";
                      ?></h2>
                  </div>
              </div>
              <table style="margin-left: 180px; width:90%">
                <!-- <tr>
                  <td class="text-left">Your Refference no</td>
                  <td class="text-left"><div class="dis_b"><?php echo $ref;  ?></div></td>
                </tr> -->
                <tr>
                  <td class="text-left">Name of Hostel</td>
                  <td>
                    <!-- <input type = "text" name="nameOfHostel" style="text-align:center;"> -->
                    <!-- <input list="namesOfHostel" name="nameOfHostel" style="text-align:center;"/> -->
                    <select class="form-select" id="inputGroupSelect02" name="nameOfHostel" style="width:450px">
                          <!-- <datalist id="namesOfHostel"> -->
                          <option selected>Choose...</option>
                            <option value="1">MHR</option>
                            <option value="2">BHR</option>
                            <option value="3">RHR</option>
                            <option value="4">SHR</option>
                            <option value="5">GHR</option>
                          <!-- </datalist> -->
                          </select>
                  </td>
                </tr>
                <tr>

                  <td class="text-left">Category of Issue</td>
                  <!-- <td><input type = "text" name="CategoryOfIssue">  </td> -->
                  <td>
                        <!-- <input list="categoriesofissue" name="CategoryOfIssue" style="text-align:center;"/> -->
                        <select class="form-select" id="inputGroupSelect02" name="CategoryOfIssue" style="width:450px">
                          <!-- <datalist id="categoriesofissue"> -->
                          <option selected>Choose...</option>
                            <option value="1">Cleanliness</option>
                            <option value="2">Electricity</option>
                            <option value="3">Broken Items</option>
                            <option value="4">Internet Issue</option>
                            <option value="5">Food</option>
                            <option value="6">Other</option>
                          <!-- </datalist> -->
                  </select>
                  </td>
                </tr>
                <tr>
                  <td class="text-left">Name</td>
                  <td class="text-left"><div class="form-control" style="width:450px; text-align:left"><?php echo $name; ?></div> </td>
                </tr>
                <tr>
                  <td class="text-left">Room Number</td>
                  <td><input type="text" class="form-control" name = "address" placeholder="Block-Room No." aria-label="Username" aria-describedby="addon-wrapping" style="width:450px"></td>
                  <!-- <td><input type = "text" name = "address" style="text-align:center;">  </td> -->
                </tr>
                <tr>
                  <td class="text-left">Contact Number *</td>
                  <td><input type="number" class="form-control" name = "phoneno" maxlength=10 placeholder="10-digit No." aria-label="Username" aria-describedby="addon-wrapping" style="width:450px"></td>
                  <!-- <td><input type = "number" name = "phoneno" maxlength=10 style="text-align:center;">  </td> -->
                </tr>
                <tr>
                  <td class="text-left">Your Email ID</td>
                  <td class="text-left"><div class="form-control" style="width:450px; text-align:left"><?php echo $email; ?></div></td>
                </tr>
                <tr>
                  <td class="text-left">Roll Number</td>
                  <td class="text-left"><div class="form-control" style="width:450px; text-align:left"><?php echo $rollno; ?></div></td>
                </tr>
                <tr>
                  <td class="text-left">Availability (Time)</td>
                  <td>
                        <!-- <input list="availabilityOfTime" name="availability" style="text-align:center;"/> -->
                        <select class="form-select" id="inputGroupSelect02" name="availability" style="width:450px">
                          <!-- <datalist id="availabilityOfTime"> -->
                          <option selected>Choose...</option>
                            <option value="1">Morning (6:00 - 11:59)</option>
                            <option value="2">Afternoon (12:00 - 16:00)</option>
                            <option value="3">Evening (16:00 - 20:00)</option>
                            <option value="4">Night (20:00 - 00:00)</option>
                          <!-- </datalist> -->
                        </select>
                  </td>
                </tr>
<!--                 
                <tr>
                  <td class="text-left">Your Subject *</td>
                  <td><input type="text" name = "subject" placeholder = "Subject"></td>
                </tr> -->
                <tr>
                  <td class="text-left">Your Complain *</td>
                  <td><textarea class="form-control" name="complain" rows="8" cols="80" placeholder="Your complain..." id="floatingTextarea" style="width:450px"></textarea></td>
                  <!-- <td><textarea name="complain" rows="8" cols="80" placeholder="Your complain"></textarea></td> -->
                </tr>
                <tr><td></td><td></td></tr>
                <tr>
                  <td></td>
                  <!-- <td><button type="submit" class="btn btn-primary btn-lg logmessage">Submit</button></td> -->
                  <td><button type="submit" class="log">Submit</button></td>
                </tr>
              </table>
            </div>
          </form>
        </div>
      </div>
    </div>
    <?php
      include 'footer2.php';
      ?>
    <script src="files/js/jquery.js"></script>
    <script src="files/js/bootstrap.min.js"></script>
    <script src="files/js/script.js"></script>
  </body>
</html>

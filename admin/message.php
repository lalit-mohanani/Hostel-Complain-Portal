<?php
require '../core/session.php';
require '../core/dbconfig.php';
require '../core/admin-key.php';

session_start();

?>
<?php $filter = $_GET['fil'];
$coi = $_GET['coi'];
$at = $_GET['at']; 
$vi = $_GET['vi'];
?>
<?php
$username=$_SESSION['name']." ".$_SESSION['user_last_name'];
$email=$_SESSION['email'];
$query1 = mysqli_query($conn,"SELECT * FROM admin WHERE email='$email'");
$arry1 = mysqli_fetch_array($query1);
$hos = $arry1['hostel'];
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
  <link rel="stylesheet" href="../files/css/custom.css">
  <style>
    li {
      font-size: 18px;
    }

    .Admin-data {
      width: 280px;
      height: 70px;
      border-left: 5px solid #4db6ac;
      position: relative;
      transition: 0.3s;
      left: 30px;
      margin-top: 25px;
      padding: 20px 10px 14px 20px;
      font-size: 20px;
    }

    .reset-style,
    .reset-style * {
      all: revert;
    }

    .dropdown-item {
      font-size: 18px;
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
              <h1 style="font-size:38px;">Complaints</h1>
            </div>

            <div class="col-md-auto">

              <div class="col-lg-12" style="padding-left:10px">
                
                <br><br><br><br>
                <br><br>

                <br>

                <div class="col-lg-12">
                  <?php
                  if (empty($filter) && empty($coi) && empty($at) && empty($vi)) {
                    $result = mysqli_query($conn, "SELECT * FROM `cmp_log` where cmp_log.ref_no in (select stats.ref_no from `stats` where status in ($aid)) ORDER BY `cmp_log`.`id` DESC");
                  } else if (!empty($filter)) {
                    $result = mysqli_query($conn, "SELECT * FROM `cmp_log` where nameOfHostel='$filter' AND cmp_log.ref_no in (select stats.ref_no from `stats` where status in ($aid)) ORDER BY `cmp_log`.`id` DESC");
                  } else if (!empty($coi)) {
                    $result = mysqli_query($conn, "SELECT * FROM `cmp_log` where CategoryOfIssue='$coi' and cmp_log.ref_no in (select stats.ref_no from `stats` where status in ($aid)) ORDER BY `cmp_log`.`id` DESC");
                  } else if (!empty($at)) {
                    $result = mysqli_query($conn, "SELECT * FROM `cmp_log` where availability='$at' and cmp_log.ref_no in (select stats.ref_no from `stats` where status in ($aid)) ORDER BY `cmp_log`.`id` DESC");
                  } else {
                    $result = mysqli_query($conn, "SELECT * FROM `cmp_log` where visibility='$vi' and cmp_log.ref_no in (select stats.ref_no from `stats` where status in ($aid)) ORDER BY `cmp_log`.`public_cmp_freq` DESC");
                  }
                  $num_rows = mysqli_num_rows($result);
                  ?>

                  <br><br>
                  <br>

                  <div class="row" style="margin-top:40px">
                    <div class="col-md-4 col-lg-2">
                      <div class="btn-group dropend">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton2" data-bs-toggle="dropdown" aria-expanded="false" style="background-color:#4db6ac;color:#FFFFFF ;padding-right: 12px;padding-left: 12px; padding-top: 8px;padding-bottom: 8px; font-weight: bold;
                 -webkit-box-shadow: 3px 3px 9px 0px rgba(0,0,0,0.25);
-moz-box-shadow: 3px 3px 9px 0px rgba(0,0,0,0.25);
box-shadow: 3px 3px 9px 0px rgba(0,0,0,0.25);">
                          Filter
                        </button>
                        <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="dropdownMenuButton2">
                          <li class="dropdown-submenu dropdown-submenu-dark">
                            <a class="test dropdown-item dropdown-toggle" tabindex="-1" href="#">Hostel Name</a>
                            <ul class="dropdown-menu dropdown-menu-dark">
                              <li><a class="dropdown-item" tabindex="-1" href="?fil=MHR">MHR</a></li>
                              <li><a class="dropdown-item" tabindex="-1" href="?fil=BHR">BHR</a></li>
                              <li><a class="dropdown-item" tabindex="-1" href="?fil=RHR">RHR</a></li>
                              <li><a class="dropdown-item" tabindex="-1" href="?fil=SHR">SHR</a></li>
                              <li><a class="dropdown-item" tabindex="-1" href="?fil=GHR">GHR</a></li>
                            </ul>
                          </li>
                          <li class="dropdown-submenu dropdown-submenu-dark">
                            <a class="test dropdown-item dropdown-toggle" tabindex="-1" href="#">Category of Issue</a>
                            <ul class="dropdown-menu dropdown-menu-dark">
                              <li><a class="dropdown-item" tabindex="-1" href="?coi=Cleanliness">Cleanliness</a></li>
                              <li><a class="dropdown-item" tabindex="-1" href="?coi=Electricity">Electricity</a></li>
                              <li><a class="dropdown-item" tabindex="-1" href="?coi=Broken Items">Broken Items</a></li>
                              <li><a class="dropdown-item" tabindex="-1" href="?coi=Internet Issue">Internet Issue</a></li>
                              <li><a class="dropdown-item" tabindex="-1" href="?coi=Food">Food</a></li>
                              <li><a class="dropdown-item" tabindex="-1" href="?coi=Other">Other</a></li>
                            </ul>
                          </li>
                          <li class="dropdown-submenu dropdown-submenu-dark">
                            <a class="test dropdown-item dropdown-toggle" tabindex="-1" href="#">Availability</a>
                            <ul class="dropdown-menu dropdown-menu-dark">
                              <li><a class="dropdown-item" tabindex="-1" href="?at=Morning (6:00 - 11:59)">Morning (6:00 - 11:59)</a></li>
                              <li><a class="dropdown-item" tabindex="-1" href="?at=Afternoon (12:00 - 16:00)">Afternoon (12:00 - 16:00)</a></li>
                              <li><a class="dropdown-item" tabindex="-1" href="?at=Evening (16:00 - 20:00)">Evening (16:00 - 20:00)</a></li>
                              <li><a class="dropdown-item" tabindex="-1" href="?at=Night (20:00 - 00:00)">Night (20:00 - 00:00)</a></li>
                            </ul>
                          </li>
                          <li class="dropdown-submenu dropdown-submenu-dark">
                            <a class="test dropdown-item dropdown-toggle" tabindex="-1" href="#">Visibility</a>
                            <ul class="dropdown-menu dropdown-menu-dark">
                              <li><a class="dropdown-item" tabindex="-1" href="?vi=Public">Public</a></li>
                              <li><a class="dropdown-item" tabindex="-1" href="?vi=Private">Private</a></li>
                            </ul>
                          </li>
                        </ul>
                        <!--Commented till bug is cleared-->
<!--                        <a class='btn btn-secondary' style="display:flex;align-items: center;margin-left:10px;border-radius:0.375rem;background-color:#4db6ac;color:#FFFFFF ;padding-right: 12px;padding-left: 12px; padding-top: 8px;padding-bottom: 8px; font-weight: bold;-->
<!--                 -webkit-box-shadow: 3px 3px 9px 0px rgba(0,0,0,0.25);-->
<!---moz-box-shadow: 3px 3px 9px 0px rgba(0,0,0,0.25);-->
<!--box-shadow: 3px 3px 9px 0px rgba(0,0,0,0.25);" href='accepted.php?fil=<?php echo $hos?>'>Accepted</a>-->
<!--                        <a class='btn btn-secondary' style="display:flex;align-items: center;margin-left:10px;border-radius:0.375rem;background-color:#4db6ac;color:#FFFFFF ;padding-right: 12px;padding-left: 12px; padding-top: 8px;padding-bottom: 8px; font-weight: bold;-->
<!--                 -webkit-box-shadow: 3px 3px 9px 0px rgba(0,0,0,0.25);-->
<!---moz-box-shadow: 3px 3px 9px 0px rgba(0,0,0,0.25);-->
<!--box-shadow: 3px 3px 9px 0px rgba(0,0,0,0.25);" href='rejected.php?fil=<?php echo $hos?>'>Rejected</a>-->
                      </div>
                    </div>
                  </div>
                  <br>
                  <div class='Admin-data'>
                    Total Complaints
                    <span class='button view' href=''><?php echo "$num_rows"; ?></a>
                  </div>


                  <!-- <br> -->
                  <h2 class="text-center"><?php echo $message; ?></h2>
                  <br><br>


                  <div class="list-group" style="padding-right:15px">
                    <ol>
                      <?php

                      while ($data = mysqli_fetch_array($result)) {

                        echo '<li>';
                        echo "<a href='message-view.php?ref=$data[ref_no]' data-bs-toggle='popover' data-bs-trigger='hover focus' title='Complain' data-bs-content='$data[complain]' class='list-group-item list-group-item-action' aria-current='true' style='color:black; border-radius:12px'>";
                        echo '<div class="d-flex w-100 justify-content-between">';
                        echo '<h5 class="mb-1">';
                        echo $data['name'];
                        $empty = $data['name'];
                        echo '</h5>';
                        $result2 = mysqli_query($conn, "SELECT * FROM `stats` WHERE ref_no=$data[ref_no]");
                        $data2 = mysqli_fetch_array($result2);
                        $t = $data2['time'];
                        echo "<small style='font-size:14px;'>";
                        echo substr($t, 0, 9) ;
                        echo "</small>";
                        echo '</div>';
                        echo '<div class="d-flex justify-content-between">';
                        echo "<span class='mb-1' style='color:#666;font-size:16px;'>Category: $data[CategoryOfIssue]</span>";
                        echo '</div>';
                        echo '<div class="d-flex justify-content-between">';
                        echo "<span style='color:#666;font-size:14px;'>$data[nameOfHostel], $data[address] | Phone No. ";
                        echo $data['phone no'];
                        echo " | Availability: $data[availability]</span>";
                        // echo '<medium style="color:red">Public</medium>';
                        // echo "<medium style='color:green'>$data[visibility]</medium>";
                        if ($data['visibility'] == 'Private') {
                          echo "<span style='color: green; font-size:16px '>$data[visibility]</span>";
                        }
                        if ($data['visibility'] == 'Public') {
                          echo "<span style='color: red;font-size:16px'>$data[visibility] <medium style='background-color: red; border-radius: 8px; padding:4px; color: white'>$data[public_cmp_freq]</medium></span>";
                        }
                        echo '</div>';
                        // echo "<a class='button view' href='message-view.php?ref=$data[ref_no]'>View</a>";
                        //echo "</div>";
                        echo "</a>";
                        echo '</li>';
                        echo "<br>";
                      }
                      if (empty($empty) == true) {
                        $message = "You Have no Message !!";
                      } else {
                        $message = "You Have got some Message";
                      }


                      ?>
                    </ol>
                  </div>



                  <br><br><br><br><br><br><br><br><br><br><br><br>

                </div>
              </div>

            </div>
          </div>
        </main>
      </div>
    </div>
  </div>

  <script src="../files/js/jquery.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
  <script src="../files/js/script.js"></script>

  <script>
    $(document).ready(function() {
      $(".dropdown-submenu a.test").on("click", function(e) {
        $(this)
          .next("ul")
          .toggle();
        e.stopPropagation();
        e.preventDefault();
      });
    });
  </script>

  <script>
    var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'))
    var popoverList = popoverTriggerList.map(function(popoverTriggerEl) {
      return new bootstrap.Popover(popoverTriggerEl)
    })
  </script>

</body>

</html>
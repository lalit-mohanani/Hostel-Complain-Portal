<?php
require './core/session.php';
require './core/config1.php';
require 'core/redirect.php';
// require './core/user_key.php';

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


</head>

<body>

  <div class="animated fadeIn">

  <!-- <div class="coverusr" style="height: 300px; ;"> -->
    <div class="cover user text-center" style="height:120px;">
      <br>
      <h2>Complaints</h2>
    </div>

    <?php require 'nav-profile.php'; ?>
    <div class="col-md-auto">
      <div class="col-lg-12">
        <?php
        function color($data)
        {
            if ($data=="private" )
                return 'red';
            else 
                return 'green';
           
        }
        $email = $_SESSION['email'];
        $result = mysqli_query($conn,"SELECT * FROM `cmp_log` WHERE email='$email'");
        $num_rows = mysqli_num_rows($result);
        

        ?>
        <!-- <div class='admin-data'>
                Complaints
                <span class='button view' href=''><?php echo "$num_rows"; ?> </a>
              </div> -->

        <br><br><br><br>
        <br><br>

        <br>
        <h2 class="text-center"><?php echo $message; ?></h2>
        <br><br>

        <div class="list-group" style="margin-right:10px;">
          <ol style="padding-left:25px">
            <?php

while ($data = mysqli_fetch_array($result)) {
         
              // echo"<div class='admin-data'>";
              echo '<li>';
              echo "<a href='status-view.php?ref=$data[ref_no]' data-bs-toggle='popover' data-bs-trigger='hover focus' title='Complain' data-bs-content='$data[complain]' class='list-group-item list-group-item-action' aria-current='true' style='color:black; border-radius:12px'>";
              echo '<div class="d-flex w-100 justify-content-between">';
              echo '<h5 class="mb-1">';
              echo $data['name'];
              $empty = $data['name'];
              echo '</h5>';
              echo '<small>3 days ago</small>';
              echo '</div>';
              echo "<p class='mb-1'>Category: $data[CategoryOfIssue]</p>";
              echo '<div class="d-flex justify-content-between">';
              echo "<small style='color:#37474f'>$data[nameOfHostel], $data[address] | Phone No. ";
              echo $data['phone no'];
              echo " | Availability: $data[availability]</small>";
              // echo '<small style="color:red">Public</small>';
              if($data['visibility']=='Private'){echo "<medium style='color: green '>$data[visibility]</medium>";}
              if($data['visibility']=='Public'){echo "<medium style='color: red '>$data[visibility]</medium>";}
              // echo "<medium style='color: .color($data[visibility]). '>$data[visibility]</medium>";
              echo '</div>';
              // echo "<a class='button view' href='status-view.php?ref=$data[ref_no]'>View Status</a>";
              // echo "</div>";
              echo "</a>";
              echo '</li>';
              echo "<br>";
              // echo "<br><br><br><br><br>";
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

  <!-- <footer2>
    <br><br>&copy <?php echo date("Y"); ?> <?php echo $web_name; ?>
  </footer2> -->

  <script src="files/js/jquery.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
  <script src="files/js/script.js"></script>
  <script>
    var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'))
    var popoverList = popoverTriggerList.map(function(popoverTriggerEl) {
      return new bootstrap.Popover(popoverTriggerEl)
    })
  </script>

</body>

</html>
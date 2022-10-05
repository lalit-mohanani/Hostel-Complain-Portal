<?php

  require 'core/session.php';
  require 'core/config.php';
  include 'core/user_key.php';

//  require 'core/redirect.php';

 ?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Hostel Management Portal</title>
  <link rel="shortcut icon" href="files/img/hm12.jpg">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  <!-- <link rel="stylesheet" href="files/css/bootstrap.css"> -->
  <link rel="stylesheet" href="files/css/custom.css">
  <style>
    
.navbar-custom {
	background-color: rgb(28, 169, 122);
}

  </style>
</head>

<body>

  <nav class="navbar navbar-dark navbar-custom navbar-light navbar-expand-lg fixed-top bg-none" >
    <div class="container-fluid">
      <a class="navbar-brand" href="#" style="color:aliceblue">Hostel Portal</a>
      <button class="navbar-toggler shadow-none" style="border-width:0 ;" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="offcanvas offcanvas-end " style="background-color: rgb(0, 95, 75);" tabindex="-1" id="offcanvasDarkNavbar" aria-labelledby="offcanvasDarkNavbarLabel">
        <div class="offcanvas-header">
          <h5 class="offcanvas-title" id="offcanvasDarkNavbarLabel"></h5>
          <button type="button" class="btn-close btn-close-white shadow-none"  style="border-width:0px ;" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
          <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" style="color: white; font-size: 0.9em;" href="profile.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link"   style="color: white; font-size: 0.9em;" href="message.php" >Add Complaints</a>
            </li>
            <li class="nav-item">
              <a class="nav-link"  style="color: white; font-size: 0.9em;" href="status.php">View Status</a>
            </li>
            <li class="nav-item">
              <a class="nav-link"  style="color: white; font-size: 0.9em;" href="logout.php" onClick="javascript:return confirm ('Do you really want to Logout ?');">Logout</a>
            </li>
            
          </ul>
         
        </div>
      </div>
    </div>
  </nav>
  <div class="coverusr" style="height: 300px; ;">

    <p class="text-right pdd" style="padding-left:75%">
      <?php echo date("d M , l "); ?>
    </p>
  </div>

  <div class="animated fadeIn">



    <div class="content">
      <div class="container text-center" style="margin-top: 30px;padding-top: 10px;">



        <h2 class="text-center" style="text-align: center;">How to complain?</h2>
        <br><br><br>
        <div class="row align-items-start">
          <div class="col-sm-4" style="border: 0px solid  #4db6ac; ">
            <div class="quotes blg text-center" style="border: 0px solid  #4db6ac;">
              <h3>First</h3>
              <p>You can complain directly with us you have been dealing with. Complaints are often sorted out
                immediately this way.</p>
            </div>
          </div>

          <div class="col-sm-4">
            <div class="quotes blg text-center" style="border: 0px solid  #4db6ac;">
              <h3>Second</h3>
              <p>If you don’t know who to contact, or you have a name but no telephone number, then call our enquiries
                team on 18XX XXX XXX</p>
            </div>
          </div>

          <div class="col-sm-4">
            <div class="quotes blg text-center" style="border: 0px solid  #4db6ac;">
              <h3>Third</h3>
              <p>The Best way to complain you can use our online complaints form.</p>
            </div>
          </div>
        </div>

        <left -->

        <!-- <div class="content">
                <div class="col-lg-12">
                  <div class="posts">
                    <?php
                      $db=mysql_query("SELECT * FROM `posts` ");
                      while($data=mysql_fetch_array($db)) {
                      echo "<br> <br> <div class='quotes glow'> ";
                      echo "<h4 class='heading'> Heading : ".$data['subject']."</h4>";
                      echo "<p> Story : ".$data['story']."<br><br>";
                      echo " Posted By : ".$data['session_name']."<br>";
                      echo "</p></div><br><br>";
                     }
                    ?>
                  </div>
                </div>
              </div> -->





        <div class="col-lg-12">
          <div class="jumbotron india_cover"></div>
        </div>

      </div>
    </div>
  </div>

  <!-- <?php
      include 'footer2.php';
      ?> -->






  <?php include 'core/jsscript.php'; ?>
</body>

</html>
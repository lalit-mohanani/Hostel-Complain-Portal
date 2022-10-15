<?php
require '../core/session.php';
require '../core/admin-key.php';
$host = "db4free.net"; 
$database = "hostel_db";
$username = "webnduser";
$password = "webndPass";


$conn = mysqli_connect($host, $username, $password, $database);

if(!$conn){
   die('Error in connecting to server or Database');
 }

 session_start();
$email=$_SESSION['email'];
  $query1 = mysqli_query($conn,"SELECT * FROM admin WHERE email='$email'");
  $arry1 = mysqli_fetch_array($query1);
  $usr = $arry1['name'];
  $hos=$arry1['hostel'];
  $aid = $arry1['id'];
?>

<div class="col-12 col-sm-3 col-xl-2 sm-2 px-0 bg-dark d-flex sticky-top" style="background-color:#37474f">
    <div class="d-flex flex-sm-column flex-row flex-grow-1 align-items-center align-items-sm-start px-3 pt-2 text-white" style="background-color:#37474f">
        <a href="admin-profile.php" class="d-flex align-items-center pb-sm-3 mb-md-0 me-md-auto text-white text-decoration-none" style="font-size:40px">
            <span class="">HMP<span class="d-none d-sm-inline" style="font-size:40px;"></span></span>
        </a>
        <ul class="nav nav-pills flex-sm-column flex-row flex-nowrap flex-shrink-1 flex-sm-grow-0 flex-grow-1 mb-sm-auto mb-0 justify-content-center align-items-center align-items-sm-start" id="menu">
            <li class="nav-item">
                <a href="admin-profile.php" class="nav-link px-sm-0 px-2">
                    <!-- <i class="fs-5 bi-house"></i> -->
                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-house" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M2 13.5V7h1v6.5a.5.5 0 0 0 .5.5h9a.5.5 0 0 0 .5-.5V7h1v6.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5zm11-11V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z" />
                        <path fill-rule="evenodd" d="M7.293 1.5a1 1 0 0 1 1.414 0l6.647 6.646a.5.5 0 0 1-.708.708L8 2.207 1.354 8.854a.5.5 0 1 1-.708-.708L7.293 1.5z" />
                    </svg>
                    <span class="ms-1 d-none d-sm-inline text-white">Home</span>
                </a>
            </li>
            <br>
            <li class="dropdown">
                <a href="#" class="nav-link dropdown-toggle px-sm-0 px-2" id="dropdown" data-bs-toggle="dropdown" aria-expanded="false">
                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-envelope-paper" viewBox="0 0 16 16">
                        <path d="M4 0a2 2 0 0 0-2 2v1.133l-.941.502A2 2 0 0 0 0 5.4V14a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V5.4a2 2 0 0 0-1.059-1.765L14 3.133V2a2 2 0 0 0-2-2H4Zm10 4.267.47.25A1 1 0 0 1 15 5.4v.817l-1 .6v-2.55Zm-1 3.15-3.75 2.25L8 8.917l-1.25.75L3 7.417V2a1 1 0 0 1 1-1h8a1 1 0 0 1 1 1v5.417Zm-11-.6-1-.6V5.4a1 1 0 0 1 .53-.882L2 4.267v2.55Zm13 .566v5.734l-4.778-2.867L15 7.383Zm-.035 6.88A1 1 0 0 1 14 15H2a1 1 0 0 1-.965-.738L8 10.083l6.965 4.18ZM1 13.116V7.383l4.778 2.867L1 13.117Z" />
                    </svg>
                    <span class="ms-1 d-none d-sm-inline text-white">Complaints</span>
                </a>
                <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdown">
                    <li><a class="dropdown-item" href="message.php?fil=<?php echo $hos?>">Your Hostel</a></li>
                    <li><a class="dropdown-item" href="message.php">Other Hostels</a></li>
                    <!-- <li><a class="dropdown-item" href="message.php?">Other Wardens</a></li> -->
                </ul>
            </li>
            <br>
            <li>
                <a href="general.php" class="nav-link px-sm-0 px-2">
                    <!-- <i class="fs-5 bi-table"></i> -->
                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
                        <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z" />
                    </svg>
                    <span class="ms-1 d-none d-sm-inline text-white">Account</span>
                </a>
            </li>
            <br>
            <li>
                <a href="../logout.php" onClick="javascript:return confirm ('Do you really want to logout ?');" class="nav-link px-sm-0 px-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-box-arrow-left" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M6 12.5a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v2a.5.5 0 0 1-1 0v-2A1.5 1.5 0 0 1 6.5 2h8A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-8A1.5 1.5 0 0 1 5 12.5v-2a.5.5 0 0 1 1 0v2z" />
                        <path fill-rule="evenodd" d="M.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L1.707 7.5H10.5a.5.5 0 0 1 0 1H1.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3z" />
                    </svg>
                    <span class="ms-1 d-none d-sm-inline text-white">Logout</span>
                </a>
            </li>
        </ul>
        <div class="dropdown py-sm-4 mt-sm-auto ms-auto ms-sm-0 flex-shrink-1">
            <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                <svg xmlns="http://www.w3.org/2000/svg" width="27" height="27" fill="currentColor" class="bi bi-person-badge" viewBox="0 0 16 16">
                    <path d="M6.5 2a.5.5 0 0 0 0 1h3a.5.5 0 0 0 0-1h-3zM11 8a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                    <path d="M4.5 0A2.5 2.5 0 0 0 2 2.5V14a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2.5A2.5 2.5 0 0 0 11.5 0h-7zM3 2.5A1.5 1.5 0 0 1 4.5 1h7A1.5 1.5 0 0 1 13 2.5v10.795a4.2 4.2 0 0 0-.776-.492C11.392 12.387 10.063 12 8 12s-3.392.387-4.224.803a4.2 4.2 0 0 0-.776.492V2.5z" />
                </svg>
                <span class="d-none d-sm-inline mx-1" style="font-size:21px">Contacts</span>
            </a>
            <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">
                <li><a class="dropdown-item" href="#">Cheif Warden</a></li>
                <li><a class="dropdown-item" href="#">Hostel Wardens</a></li>
                <li><a class="dropdown-item" href="#">Hall Offices</a></li>
            </ul>
        </div>
    </div>
</div>
<!-- <div class="col d-flex flex-column h-sm-100">
            <main class="row overflow-auto">
                
            </main>
            <footer class="row bg-light py-4 mt-auto">
                <div class="col"> Footer content here... </div>
            </footer>
        </div> -->

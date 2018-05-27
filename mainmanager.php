<?php
session_start();
if($_SESSION["role"]!="ผู้จัดการ"){
  echo '<script type="text/javascript">
        window.location.href = "index.php"
    </script>';
}
include 'conn.php';

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" >
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.css" >
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css" >
    <title>ระบบผู้จัดการร้าน</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
body, h1,h2,h3,h4,h5,h6 {font-family: "Montserrat", sans-serif}
.w3-row-padding img {margin-bottom: 12px}
/* Set the width of the sidebar to 120px */
.w3-sidebar {width: 120px;background: #222;}
/* Add a left margin to the "page content" that matches the width of the sidebar (120px) */
#main {margin-left: 120px}
/* Remove margins from "page content" on small screens */
@media only screen and (max-width: 600px) {#main {margin-left: 0}}
</style>
<style>
.mySlides {display:none;}
</style>
  </head>
  <body class="w3-grey">

<!-- Icon Bar (Sidebar - hidden on small screens) -->
<nav class="w3-sidebar w3-bar-block w3-small w3-hide-small w3-center">
  <!-- Avatar image in top left corner -->
  <img src="pics/mainlogo.jpg" style="width:80%">
  <a href="#" class="w3-bar-item w3-button w3-padding-large w3-grey">
    <i class="fa fa-home w3-xxlarge"></i>
    <p>หน้าหลัก</p>
  </a>
  <a href="#food" class="w3-bar-item w3-button w3-padding-large w3-hover-black">
    <i class="fa fa-refresh w3-spin w3-xxlarge"></i>
    <p>รายการอาหาร</p>
  </a>
  <a href="#material" class="w3-bar-item w3-button w3-padding-large w3-hover-black">
    <i class="fa fa-truck w3-xxlarge"></i>
    <p>รายการวัตถุดิบ</p>
  </a>
  <a href="#sale" class="w3-bar-item w3-button w3-padding-large w3-hover-black">
    <i class="fa fa-file w3-xxlarge"></i>
    <p>ข้อมูลการขาย</p>
  </a>
  <br>
  <a href="index.php"><button type="button" class="btn btn-outline-secondary">ออกจากระบบ</button></a>
</nav>

<!-- Navbar on small screens (Hidden on medium and large screens) -->
<div class="w3-top w3-hide-large w3-hide-medium" id="myNavbar">
  <div class="w3-bar w3-black w3-opacity w3-hover-opacity-off w3-center w3-small">
    <a href="#" class="w3-bar-item w3-button" style="width:25% !important">หน้าหลัก</a>
    <a href="#food" class="w3-bar-item w3-button" style="width:25% !important">รายการอาหาร</a>
    <a href="#material" class="w3-bar-item w3-button" style="width:25% !important">รายการวัตถุดิบ</a>
    <a href="#sale" class="w3-bar-item w3-button" style="width:25% !important">ข้อมูลการขาย</a>
  </div>
</div>

<!-- Page Content -->
<div class="w3-padding-large w3-light-grey" id="main">
  <!-- Header/Home -->
  <header class="w3-container w3-padding-32 w3-center " id="home">
    <h1 class="w3-jumbo"><span class="w3-hide-small">I'm</span> Take It Easy.</h1>
    <p>Manager Systems for <?php echo $_SESSION["sname"]." ".$_SESSION["lname"]; ?></p>

    <div class="w3-content w3-display-container" style="max-width:1200px">
      <div class="w3-content w3-section" style="max-width:1500px">
      <img class="mySlides" src="pics/1.jpg" style="width:100%">
      <img class="mySlides" src="pics/2.jpg" style="width:100%">
      <img class="mySlides" src="pics/3.jpg" style="width:100%">
      <img class="mySlides" src="pics/4.jpg" style="width:100%">
      <img class="mySlides" src="pics/5.jpg" style="width:100%">
      <img class="mySlides" src="pics/6.jpg" style="width:100%">
    </div>
  </div>
</div>
  </header>



  </div>
    <!-- Footer -->
  <footer class="w3-content w3-padding-64 w3-text-grey w3-xlarge">
    <i class="fa fa-facebook-official w3-hover-opacity"></i>
    <i class="fa fa-instagram w3-hover-opacity"></i>
    <i class="fa fa-snapchat w3-hover-opacity"></i>
    <i class="fa fa-pinterest-p w3-hover-opacity"></i>
    <i class="fa fa-twitter w3-hover-opacity"></i>
    <i class="fa fa-linkedin w3-hover-opacity"></i>
    <p class="w3-medium">Powered by <a href="https://www.facebook.com/onooteyziio" target="_blank" class="w3-hover-text-green">Kanlayanee Kaweesonsakul</a></p>
  <!-- End footer -->
  </footer>

<!-- END PAGE CONTENT -->
<script>
var myIndex = 0;
carousel();

function carousel() {
    var i;
    var x = document.getElementsByClassName("mySlides");
    for (i = 0; i < x.length; i++) {
       x[i].style.display = "none";
    }
    myIndex++;
    if (myIndex > x.length) {myIndex = 1}
    x[myIndex-1].style.display = "block";
    setTimeout(carousel, 2000); // Change image every 2 seconds
}
</script>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" ></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" ></script>
    <script src="https://code.jquery.com/jquery-1.12.4.js" ></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js" ></script>
    <script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js" ></script>
    <script>
    $(document).ready(function() {
   $('#example').DataTable();
} );
    </script>

  </body>
</html>

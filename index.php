<!doctype html>
<html lang="en">
  <head>
    <?php
    session_start();
    session_destroy();
     ?>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">

    <title>Take it easy</title>
   <?php include 'regis.php';
   $er=0;
   if(!empty($_GET["er"]))$er=$_GET["er"];
   ?>
  </head>
  <body>

    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <div id="fullscreen_bg" class="fullscreen_bg"/>
    <?php
    if($er==1) echo '<div class="alert alert-danger" role="alert">
  อีเมลล์หรือรหัสผ่านไม่ถูกต้อง !
</div>';
     ?>
    <div class="container">
      <form class="form-signin" method="post" action="checklogin.php">
        <img src="pics/logo.png" width="270">
        <input type="email" name="email" class="form-control" placeholder="Email address" required="" autofocus="">
        <input type="password" name="pass" class="form-control" placeholder="Password" required="">
        <button class="btn btn-lg btn-success" type="submit">Log In  </button>
          OR:  <a href="register.php"><button type="button" class="btn btn-lg btn-primary" >Register</button></a>
        </form>

    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>

  </body>
</html>

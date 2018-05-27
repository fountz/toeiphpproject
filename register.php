<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">

    <title>Take it easy</title>
    <?php include 'regis.php'; ?>
  </head>
  <body>

    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <div id="fullscreen_bg" class="fullscreen_bg"/>
    <?php

    $email=$pass=$sname=$lname=$phone="";
    $flag=0;
    if(isset($_POST["submit"])){
      $email=$_POST["email"];
      $pass=$_POST["pass"];
      $sname=$_POST["sname"];
      $lname=$_POST["lname"];
      $phone=$_POST["phone"];
      include 'conn.php';
      $sql = "SELECT * FROM users";
      $result = mysqli_query($conn, $sql);
      while($row = mysqli_fetch_assoc($result)) {
        if($row["email"]==$email)$flag=1;
    }
    if($flag==0){
      $sql = "INSERT INTO users (email, password, sname, lname, phone, role) VALUES ('".$email."','".$pass."','".$sname."','".$lname."','".$phone."','สมาชิก')";
      $query = mysqli_query($conn,$sql);
      echo '<script type="text/javascript">
            window.location.href = "complete.php"
        </script>';
    }
mysqli_close($conn);
    }

     ?>
    <div class="container">
      <?php

       ?>
      <form class="form-signin" method="post" action="">
        <img src="pics/logo.png" width="270">
        <?php
        if($flag==1){ ?>
          <input type="email" name="email" class="form-control is-invalid" id="validationServer03" placeholder="Email address" value="<?php echo $email; ?>" required>
     <div class="invalid-feedback">
       อีเมลล์นี้มีผู้ใช้งานไปแล้ว
     </div>
   <?php }else{ ?>
        <input type="email" name="email" class="form-control" placeholder="Email address" required>
      <?php } ?>
        <input type="password" name="pass" class="form-control" placeholder="Password" required>
        <input type="text" name="sname" class="form-control" placeholder="ชื่อจริง" value="<?php echo $sname; ?>" required>
        <input type="text" name="lname" class="form-control" placeholder="นามสกุล" value="<?php echo $lname; ?>" required>
        <input type="number" name="phone" class="form-control" placeholder="เบอร์โทรศัพท์" value="<?php echo $phone; ?>" required>

         <button class="btn btn-lg btn-primary" type="submit" name="submit">Register</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="index.php">ย้อนกลับ</a>
        </form>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>

  </body>
</html>

<?php
session_start();
include 'conn.php';
$email=$_POST["email"];
$pass=$_POST["pass"];
$sql = "SELECT * FROM users";
$result = mysqli_query($conn, $sql);
$flag=0;
while($row = mysqli_fetch_assoc($result)) {
  if($row["email"]==$email){
    if($row["password"]==$pass){
      $_SESSION["id"]=$row["id"];
      $_SESSION["sname"]=$row["sname"];
      $_SESSION["lname"]=$row["lname"];
      $_SESSION["role"]=$row["role"];
      $_SESSION["phone"]=$row["phone"];
      if($_SESSION["role"]=="สมาชิก") echo '<script type="text/javascript">
            window.location.href = "main.php"
        </script>';
        else if($_SESSION["role"]=="admin") echo '<script type="text/javascript">
              window.location.href = "mainadmin.php"
          </script>';
          else if($_SESSION["role"]=="ผู้จัดการ") echo '<script type="text/javascript">
                window.location.href = "mainmanager.php"
            </script>';
    }

  }
}
echo '<script type="text/javascript">
      window.location.href = "index.php?er=1"
  </script>';
 ?>

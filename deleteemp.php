<?php
$id=$_GET["id"];
include 'conn.php';
$sql = "DELETE FROM users WHERE id=$id";
$query = mysqli_query($conn,$sql);
echo '<script type="text/javascript">
      window.location.href = "mainadmin.php?de=1"
  </script>';
 ?>

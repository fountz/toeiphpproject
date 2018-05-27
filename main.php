<?php
session_start();
if($_SESSION["role"]!="สมาชิก"){
  echo '<script type="text/javascript">
        window.location.href = "index.php"
    </script>';
}
 ?>

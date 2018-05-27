<?php
$serverName = "localhost";
$userName = "root";
$userPassword = "";
$dbName = "food";

$conn = mysqli_connect($serverName,$userName,$userPassword,$dbName);
if (mysqli_connect_errno())
	{
		echo "Database Connect Failed : " . mysqli_connect_error();
	}
mysqli_set_charset($conn, "utf8");
?>

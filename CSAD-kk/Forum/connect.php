<?php
$host = "localhost";
$username = "root";
$password = "";
$db = "forum";

$con = mysqli_connect($host, $username, $password) or die(mysql_error());
mysqli_select_db($con,$db);
?>


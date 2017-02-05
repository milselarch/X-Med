<?php
$host = "localhost";
$username = "webuser";
$password = "password";
$db = "X_Med";

$con = mysqli_connect($host, $username, $password) or die(mysql_error());
mysqli_select_db($con,$db);
?>


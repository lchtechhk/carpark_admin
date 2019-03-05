<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "park";
$connect = mysqli_connect($servername,$username,$password,$dbname);
mysqli_set_charset($connect, "utf8");
if (!$connect) { 
 die("Connection failed: " . mysqli_connect_error());
}
?>
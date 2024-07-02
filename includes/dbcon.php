<?php

$servername = "localhost";


$username = "root";
$password = "";
$dbname = "tbearn";
// $username = "root";
// $password = "";
// $dbname = "earning";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
$sys_set = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM system_set WHERE id = 1"));
$logo_link = substr($sys_set['logo'], 3);
?>
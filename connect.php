<?php
$servername = "localhost";
$username = "root";
$password = "";
$datbase = "pbl";

$con = mysqli_connect($servername, $username, $password, $datbase);

if (!$con) {
  echo "database is not connected";
}

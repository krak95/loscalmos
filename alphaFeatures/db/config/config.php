<?php

$host = "localhost";
$db_user = "root";
$db_pass = '';

$con = mysqli_connect($host, $db_user, $db_pass);
// Check connection
if (!$con) {
  die("Connection failed: " . mysqli_connect_error());
  exit();
}
<?php
$host ='localhost';
$uname = 'root';
$pwd = '';
$db = 'mypoket';
$con = mysqli_connect($host,$uname,$pwd,$db);
if (!$con) {
    die("Connection failed: " . mysqli_connect_error(). '<br>');
    exit();
}
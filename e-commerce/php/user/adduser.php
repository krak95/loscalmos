<?php 
require '../config/config.php';

$name = $_POST['name'];
$mail = $_POST['mail'];
$uname = $_POST['uname'];
$pass = $_POST['pass'];
$hash = password_hash($pass, PASSWORD_ARGON2I);
$sql = 'INSERT INTO users (name,email,username,password) VALUES(?,?,?,?)';
$sql1 = $con->prepare($sql);
$sql1->bind_param('ssss',$name,$mail,$uname,$hash);
$sql1->execute();

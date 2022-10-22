<?php
include '../config/config.php';

$username=$_POST['username'];
$user_email=$_POST['user_email'];
$user_pwd=$_POST['user_pwd'];

$sql= $con->prepare("INSERT INTO users (username,user_email,user_pwd) VALUES(?,?,?)");
$sql->bind_param('sss',$username,$user_email,$user_pwd);
$sql->execute();
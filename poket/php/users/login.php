<?php
include '../config/config.php';

$username=$_POST['username'];
$user_pwd=$_POST['user_pwd'];

$sql= $con->prepare("SELECT * FROM users WHERE username = ? AND user_pwd = ?");
$sql->bind_param('ss',$username,$user_pwd);
$sql->execute();
$sql->num_rows();
if(!$sql == 0){
    echo 'connect';
    session_start();
    $_SESSION['username'] = $username;
}
<?php
include '../config/config.php';
session_start();
$username = $_SESSION['username'];
$sql1 = $con->prepare("UPDATE users SET user_status = '0' WHERE username = ?");
$sql1->bind_param('s',$username);
$sql1->execute();
if($sql1){

    session_unset();
    session_destroy();
}
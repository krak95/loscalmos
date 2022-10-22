<?php
include '../config/config.php';

$username=$_POST['username'];
$user_pwd=$_POST['user_pwd'];

$sql= $con->prepare("SELECT * FROM users WHERE username = ? AND user_pwd = ?");
$sql->bind_param('ss',$username,$user_pwd);
$sql->execute();
$sql->store_result();
if(!$sql == false){
    echo 'connect';
    session_start();
    $_SESSION['username'] = $username;
$sql1 = $con->prepare("UPDATE users SET user_status = '1' WHERE username = ?");
$sql1->bind_param('s',$username);
$sql1->execute();

    if($sql1){
$sql2= $con->prepare("SELECT * FROM users WHERE username = ?");
$sql2->bind_param('s',$username);
$sql2->execute();
$result = $sql2->get_result();
while($row = $result->fetch_assoc()){
$ustat = $row['user_status'];
$_SESSION['user_status'] = $ustat;
}
}
}
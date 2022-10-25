<?php
include '../config/config.php';
session_start();
$username = $_SESSION['username'];

$sql = $con->prepare('SELECT * from poket_chat WHERE user_to_id = ? ');
$sql->bind_param('s',$username);
$sql->execute();
$result = $sql->get_result();

if($result == true){
    die('true');
}

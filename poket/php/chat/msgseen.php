<?php
include '../config/config.php';
session_start();
$username = $_SESSION['username'];
$from = $_POST['username'];

$sql = $con->prepare('UPDATE poket_chat SET msg_seen=1 WHERE user_from_id=? AND user_to_id = ?');
$sql->bind_param('ss',$from,$username);
$sql->execute();
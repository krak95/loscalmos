<?php
include '../config/config.php';
session_start();
$msg = $_POST['msg'];
$username_receiver = $_POST['username'];
echo $username_receiver;
$username_sender = $_SESSION['username'];
echo $username_sender;

$sql = $con->prepare("INSERT INTO poket_chat (chat_msg, user_from_id, user_to_id) VALUES (?,?,?)");
$sql->bind_param('sss',$msg,$username_sender,$username_receiver);
$sql->execute();

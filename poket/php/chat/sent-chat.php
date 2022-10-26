<?php
include '../config/config.php';
session_start();
$msg = $_POST['msg'];
$username_receiver = $_POST['username'];
echo $username_receiver;
$username_sender = $_SESSION['username'];
echo $username_sender;

$sql = $con->prepare("SELECT DISTINCT * FROM poket_chat WHERE user_from_id = ? AND user_to_id =?");
$sql->bind_param('ss',$username_sender,$username_receiver);
$sql->execute();
$result = $sql->get_result();
$nrows = $result->num_rows;

$sql1 = $con->prepare("UPDATE poket_chat SET msg_seen = 0 WHERE user_from_id = ? AND user_to_id = ?");
$sql1->bind_param('ss',$username_sender,$username_receiver);
$sql1->execute();
if($sql1){
    $sql = $con->prepare("INSERT INTO poket_chat (chat_msg, user_from_id, user_to_id) VALUES (?,?,?)");
    $sql->bind_param('sss',$msg,$username_sender,$username_receiver);
    $sql->execute();
}



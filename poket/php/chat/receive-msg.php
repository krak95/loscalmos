<?php
include '../config/config.php';
session_start();
$username = $_SESSION['username'];

$sql = $con->prepare('SELECT DISTINCT user_from_id from poket_chat WHERE user_to_id = ? AND msg_seen = "0"');
$sql->bind_param('s',$username);
$sql->execute();
$result = $sql->get_result();
while($row = $result->fetch_assoc()){
$msg = array($row['user_from_id']);
$_SESSION['msg'] = $msg;
echo json_encode($msg);
}
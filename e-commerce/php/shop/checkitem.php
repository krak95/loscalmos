<?php 
require '../config/config.php';
session_start();
$uname = $_SESSION['username'];
$item_id = $_POST['item_id'];

$checkforitem = $con->prepare("SELECT * FROM cart WHERE item_id = ? AND username = ?");
$checkforitem->bind_param('ss',$item_id,$uname);
$checkforitem->execute();
$result = $checkforitem->get_result()->fetch_row();
if ($result == false){
    die('doesntexists');
}else{
    die('exists');
}

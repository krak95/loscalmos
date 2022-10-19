<?php 
require '../config/config.php';
session_start();
$uname = $_SESSION['username'];
$item_id = $_POST['item_id'];


    $sql= $con->prepare("INSERT INTO cart (item_id,username) VALUES(?,?)");
    $sql->bind_param('ss',$item_id,$uname);
    $result = $sql->execute();

    ?>
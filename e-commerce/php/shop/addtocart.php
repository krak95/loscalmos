<?php 
require '../config/config.php';
session_start();
$uname = $_SESSION['username'];
$item_id = $_POST['item_id'];
$price = $_POST['price'];


    $sql= $con->prepare("INSERT INTO cart (item_id,price_final,username) VALUES(?,?,?)");
    $sql->bind_param('sss',$item_id,$price,$uname);
    $result = $sql->execute();

    ?>

<?php 
require '../config/config.php';
session_start();
$uname = $_SESSION['username'];
    $sql = 'SELECT * FROM cart WHERE username = ?';
    $sql1 = $con->prepare($sql);
    $sql1->bind_param('s',$uname);
    $sql1->execute();
    $sql1->store_result();
    $result = $sql1->num_rows;
    if($result > 0){
        die('itemsfound');
    }else{
        die('empty');
    }
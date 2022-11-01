<?php
session_start();
if(isset($_POST['name'])){
    $name = $_POST['name'];
    $_SESSION['name'] = $name;
}

header('location:session.php');
    ?>
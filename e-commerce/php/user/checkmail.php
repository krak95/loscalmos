<?php 
require '../config/config.php';
if(isset($_POST['mail'])){
$mail = $_POST['mail'];
if(filter_var($mail, FILTER_VALIDATE_EMAIL)){
    die('valid');
}else{
    die('notvalid');
}
}
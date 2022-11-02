<?php
require '../../config/config.php';
session_start();

$user_id = $_SESSION['user_id'];

$targetDir = "";
$fileName = basename($_FILES["file"]["name"]);
$targetFilePath = $targetDir . $fileName;
$fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);

if(isset($_POST["upload"]) && !empty($_FILES["file"]["name"])){
$allowTypes = array('jpg','png','PNG','JPG','JPEG','GIF','jpeg','gif','pdf');
if(in_array($fileType, $allowTypes)){
if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)){
$insert = $con->query("UPDATE users SET avatar ='$fileName' WHERE user_id = '$user_id'");

} 
}
}


header('Location:../../../index.php');
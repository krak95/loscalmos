<?php
require '../../config/config.php';
$itemid = $_POST['itemid'];

$targetDir = "";
$fileName = basename($_FILES["itemfile"]["name"]);
$targetFilePath = $targetDir . $fileName;
$fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);



if(isset($_POST["uploaditem"]) && !empty($fileName)){
$allowTypes = array('jpg','png','PNG','JPG','JPEG','GIF','jpeg','gif','pdf');
if(in_array($fileType, $allowTypes)){
if(move_uploaded_file($_FILES["itemfile"]["tmp_name"], $targetFilePath)){
$insert = $con->query("UPDATE produtos SET img ='$fileName' WHERE id = '$itemid'");
if($insert){
}
} 
}
}


header('Location:../../../index.php');
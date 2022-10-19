<?php 
require '../config/config.php';
if(isset($_POST['uname'])){
$uname = $_POST['uname'];

$sql = 'SELECT * FROM users WHERE username = ?';
$sql1 = $con->prepare($sql);
$sql1->bind_param('s',$uname);
$sql1->execute();
$arr = $sql1->get_result()->fetch_row()[0];
if($arr == 0){
    die('usernotfound');
}else{
    die('userfound');
}
}else{
    die('null');
}
?>
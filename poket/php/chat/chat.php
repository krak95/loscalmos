<?php
include '../config/config.php';
session_start();
$username_receiver = $_POST['username'];
$username_sender = $_SESSION['username'];
?>
<h3><?=$username_receiver?></h3>
<?php
$sql = $con->prepare("SELECT * FROM poket_chat WHERE user_from_id = ? AND user_to_id = ? OR
user_to_id =? AND user_from_id =? ORDER BY data ASC");
$sql->bind_param('ssss',$username_sender,$username_receiver,$username_sender,$username_receiver);
$sql->execute();
$result = $sql->get_result();
while($row = $result->fetch_assoc()){
    $msg = $row['chat_msg'];
    $from = $row['user_from_id'];
    $to = $row['user_to_id'];
    $data = $row['data'];
    if($from == $username_sender){
    ?>
    <li class='fromsender'><?=$from?> : <p><?=$msg?></p></li>
    <?php
    }else{
?>
<li class='fromreceiver'><?=$from?> : <p><?=$msg?></p></li>
<?php
    }
}

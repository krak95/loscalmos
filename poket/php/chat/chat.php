<?php
include '../config/config.php';
session_start();
$username_receiver = $_POST['username'];
$username_sender = $_SESSION['username'];
?>
<h3><?=$username_receiver?></h3>
<?php
$sql = $con->query("SELECT * FROM poket_chat WHERE user_from_id = '$username_receiver' AND user_to_id = '$username_sender' OR user_from_id = '$username_sender' AND user_to_id = '$username_receiver'  ORDER BY data ASC");
while($row = $sql->fetch_assoc()){
    $msg = $row['chat_msg'];
    $from = $row['user_from_id'];
    $to = $row['user_to_id'];
    $data = $row['data'];
    ?>
    <li><?=$from?> : <p><?=$msg?></p></li>
    <?php
}

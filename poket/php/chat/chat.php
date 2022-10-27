<?php
include '../config/config.php';
session_start();
$username_receiver = $_POST['username'];
$username_sender = $_SESSION['username'];
$sql = $con->prepare("SELECT * FROM poket_chat WHERE user_from_id = ? AND user_to_id = ? OR
user_to_id =? AND user_from_id =? ORDER BY data ASC");
$sql->bind_param('ssss',$username_sender,$username_receiver,$username_sender,$username_receiver);
$sql->execute();
$result = $sql->get_result();
?>
<?php
while($row = $result->fetch_assoc()){
    $msg = $row['chat_msg'];
    $from = $row['user_from_id'];
    $to = $row['user_to_id'];
    $datafetch = $row['data'];
    $msg_seen = $row['msg_seen'];
    $datestring = strtotime($datafetch);
    $date = date("H:i:s d-M-Y",$datestring);
    if($from == $username_sender){
    ?>
 
    <li class='sender'><p><?=$msg.'<span class="chat-date">às ' . $date. '</span>'?></p></li>
    <?php
    }else{
?>
<li class='receiver'><?php echo '<a><span>'.$username_receiver.'</span>:</a>'.$msg. '<span class="chat-date">às ' . $date. '</span>'?></li>

<?php
    }
}
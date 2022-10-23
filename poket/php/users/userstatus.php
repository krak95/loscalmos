<?php
include '../config/config.php';
session_start();
$username = $_SESSION['username'];
$sql= $con->prepare("SELECT username,user_status FROM users WHERE username != ? ");
$sql->bind_param('s',$username);
$sql->execute();
$result = $sql->get_result();

while ($row = $result->fetch_assoc()){
$uname = $row['username'];
$ustat = $row['user_status'];
?>
<li data-id=<?=$uname?>>

<?php
switch($ustat) {
case 0:
$ustat = '0';
echo '<p><span class="friendoff">offline</span> '.$uname.'</p>';
break;
case 1:
$ustat = '1';
echo '<p><span class="friendon">online</span> '.$uname.'</p>';
break;
} ?>
<img class='chat-btn' src="img/chat.png" alt="">
</li>
<?php
} ?>
<script>
$(document).ready(function(){

$('.friends li').on('click',function(){
let username = $(this).data('id');
$('.chat-box-div').css('display','flex');
$('.chat-msg-box').prepend();
$.ajax({
url:'php/chat/chat.php',
type:'post',
data:{username:username},
success:function(data){
$('.chat-msg-box ol').html(data)
}
})
const refreshchat = setInterval(() => {
    $.ajax({
    url:'php/chat/chat.php',
    type:'post',
    data:{username:username},
    success:function(data){
    $('.chat-msg-box ol').html(data)
    }
    })

}, 700);
$('.backcurtain,.return').on('click',function(){
    $('.chat-box-div').css('display','none');
    clearInterval(refreshchat);
})
})




//END OF DOCUMENT
})
</script>
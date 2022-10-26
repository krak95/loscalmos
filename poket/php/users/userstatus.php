
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

$sql1= $con->prepare("SELECT DISTINCT user_from_id,msg_seen,user_to_id from poket_chat WHERE user_from_id=? AND user_to_id = ?");
$sql1->bind_param('ss', $uname,$username);
$sql1->execute();
$result1 = $sql1->get_result();
$nrows = $result1->num_rows;
if($nrows > 0){
while($row1 = $result1->fetch_assoc()){
$notseen = $row1['msg_seen'];
$to = $row1['user_to_id'];

    ?>
    <li <?php if($notseen == 0){?>class="friendsblinker"<?php ;} ?>  data-id=<?=$uname?> ><p> <?php if($ustat == 0){?> <span class="friendoff">offline</span><?=$uname?></p> <?php  ; }
    else if($ustat == 1){ ?> <span class="friendon">online</span><?=$uname?></p> <?php ; } ?> <img class="chat-btn" src="img/chat.png" alt=""></li>
    <?php
    }

    }
    else{ ?>
        <li data-id=<?=$uname?> ><p> <?php if($ustat == 0){?> <span class="friendoff">offline</span><?=$uname?></p> <?php  ; }
        else if($ustat == 1){ ?> <span class="friendon">online</span><?=$uname?></p> <?php ; } ?> <img class="chat-btn" src="img/chat.png" alt=""></li><?php
 }
}
?>


<script>
$(document).ready(function(){
$('.friends li').on('click',function(){
let el = this;
let username = $(el).data('id');
$('.chat-box-div').css('display','flex');
$('.chat-msg-box').prepend();
$.ajax({
url:'php/chat/msgseen.php',
type:'post',
data:{username:username},
success:function(){
}
})
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
}, 250);

let leng = 0;
const ref = setInterval(() => {
if(leng != $('.chat-msg-box li').length){
leng = $('.chat-msg-box li').length;
console.log(leng);
$('.chat-msg-box').scrollTop($('.chat-msg-box ol')[0].scrollHeight);
}
}, 150);


$('.backcurtain,.return').on('click',function(){
$('.chat-box-div').css('display','none');
clearInterval(refreshchat);
clearInterval(ref);
})
})





//END OF DOCUMENT
})
</script>
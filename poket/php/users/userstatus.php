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
if($nrows == 0){
    $default= $con->prepare("INSERT INTO poket_chat (user_from_id,user_to_id,msg_seen) VALUES(?,?,1)");
$default->bind_param('ss', $uname,$username);
$default->execute();
}


while($row1 = $result1->fetch_assoc()){
$notseen = $row1['msg_seen'];
$to = $row1['user_to_id'];

switch([$ustat, $notseen]){
    case[0 , 0]:
    echo '<li class="friendsblinker" data-id='.$uname.' >  <p> <span class="friendoff"><div class="stock-red"></div></span> '.$uname.'  </p>  </li>';
    break;
    case[1 , 0]:
    echo '<li class="friendsblinker" data-id='.$uname.' >  <p> <span class="friendon"><div class="stock-green"></div></span> '.$uname.'  </p>  </li>';
    break;
    case[0 , 1]:
    echo '<li data-id='.$uname.' >  <div class="stock-red"></div>'.$uname.'   </li>';
    break;
    case[1 , 1]:
    echo '<li data-id='.$uname.' >  <div class="stock-green"></div> '.$uname.'   </li>';
    break;
}
    ?>
    
    

    <?php
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
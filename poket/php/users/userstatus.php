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
    echo '<li class="friendsblinker" data-id='.$uname.' >  <p> <span class="friendoff"><div class="stock-red"></div>&nbsp&nbsp</span> '.$uname.'  </p>  </li>';
    break;
    case[1 , 0]:
    echo '<li class="friendsblinker" data-id='.$uname.' >  <p> <span class="friendon"><div class="stock-green"></div>&nbsp&nbsp</span> '.$uname.'  </p>  </li>';
    break;
    case[0 , 1]:
    echo '<li data-id='.$uname.' >  <div class="stock-red"></div>&nbsp&nbsp'.$uname.'   </li>';
    break;
    case[1 , 1]:
    echo '<li data-id='.$uname.' >  <div class="stock-green"></div>&nbsp&nbsp '.$uname.'   </li>';
    break;
}
    }
       
 }
?>

<script>
$(document).ready(function(){
$('.friends li').on('click',function(){
let el = this;
let div = $(el).children();
let status = $(div).first().attr('class');
const username = $(el).data('id');
if ($('#'+username).length != 0){
   return;
}



$('.chat-box-div').css('display','flex');
$('.chat-box-div').prepend('<div id="chatcontainer'+username+'" class="chat-box-container"><ol class="chatheader"><li><div class="'+status+'" class="stock-red"></div>&nbsp<img src="img/friend.png">&nbsp<h3>'+username+'</h3></li><li><img class="mini" src="img/mini.png">&nbsp<img id="close'+username+'" class="close" src="img/close.png"></li></ol><div id='+username+' class="chat-msg-box"><ol class='+username+'></ol></div><div class="chat-data-box"><input type="text" id="text-msg'+username+'"><button id="submit-chat'+username+'">Send</button></div></div>');
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
$('.'+username).html(data);
}
})
const refreshchat = setInterval(() => {
$.ajax({
url:'php/chat/chat.php',
type:'post',
data:{username:username},
success:function(data){
$('.'+username).html(data);
}
})
}, 50);

let leng = 0;
const ref = setInterval(() => {
if(leng != $('.chat-msg-box li').length){
leng = $('.chat-msg-box li').length;
$('#'+username).scrollTop($('#'+username+' '+'ol')[0].scrollHeight);
}
}, 150);


$('.backcurtain,.return').on('click',function(){
$('.chat-box-div').css('display','none');
$('.chat-box-div').children().remove();
clearInterval(refreshchat);
clearInterval(ref);
})

$('#text-msg'+username).on('keypress',function(e){
    if(e.which == 13) {
        $('#submit-chat'+username).click();
    }
})

    $('#submit-chat'+username).on('click',function(){
let msg = $('#text-msg'+username).val();
$.ajax({
url:'php/chat/sent-chat.php',
type:'post',
data:{username:username,msg:msg},
success:function(){
setTimeout(() => {
$('#'+username).scrollTop($('#'+username+' '+'ol')[0].scrollHeight);
}, 200);

}
})
})

$('#close'+username).on('click',function(){
    console.log('olá')
    $('#chatcontainer'+username).remove();
})
})


//END OF DOCUMENT
})
</script>
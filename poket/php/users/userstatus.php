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
 
<li data-id=<?=$uname?> >

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
}  ?>


<script>
$(document).ready(function(){
$('.friends li').on('click',function(){
    let el = this;
let username = $(el).data('id');
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

const mailbox = setInterval(() => {
    
$('#friendson').ready(function(){
$.ajax({
    url:'php/chat/receive-msg.php',
    dataType:'html',
    type:'GET',
    success: function(data){
        let user = $('.friends li').data('id');
        $(user).ready(function(){
            alert(JSON.stringify(user));
            let last = this;
        let username = $(last).data('id');
        if(data.includes(username) === true){
            $(last).addClass('friendsblinker');
                }else{
                }
    })
            
    }
})
})
}, 200);


//END OF DOCUMENT
})
</script>
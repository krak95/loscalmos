$(document).ready(function(){
$('.play-maindiv').hide();
$('.form-signup').hide();
$('.form-login').hide();
$('.profile-div').hide();
$('#friendsoff').hide();

$('#return').on('click',function(){
$('.mainmenu').show();
$('.play-maindiv').hide();
$('.form-signup').hide();
$('.form-login').hide();
$('.profile-div').hide();
})
$('#login').on('click',function(){
$('.mainmenu').hide();
$('.form-login').show();
})
$('#signup').on('click', function(){
$('.mainmenu').hide();
$('.form-signup').show();
})

$('#signup-submit').on('click',function(){
var username = $('#uname').val();
var user_pwd = $('#email').val();
var user_email = $('#pwd').val();
$.ajax({
type:'post',
url:'php/users/signup.php',
data:{username:username,user_pwd:user_pwd,user_email:user_email},
success: function(){
alert('new user');
}
})
})

    $('#login-submit').on('click',function(){
var username = $('#loguname').val();
var user_pwd = $('#logpwd').val();
$.ajax({
type:'post',
url:'php/users/login.php',
data:{username:username,user_pwd:user_pwd},
success: function(){
alert('connect');
$(location).prop('href','');
}
})
})
$('#logout').on('click',function(){
$.ajax({
url:'php/users/logout.php',
success: function(){
alert('destroy');
$(location).prop('href','');
}
})
})

    $('#profile').on('click',function(){
$('.mainmenu').hide();
$.ajax({
url:'php/users/profile.php',
type:'post',
data:{},
success:function(data){
$('.profile-div').show();
$('.profile-div table').html(data);
}
})
})

    $('#friendson').on('click',function(){
$('.friends-btn-on').addClass('friendsanime');
$('.friends-btn-off').addClass('friendsanime');
$('.backcurtain').show();
setTimeout(() => {
$('#friendson').hide();
$('#friendsoff').show();
}, 530);

setTimeout(() => {

$('.friends').addClass('friends-list-open');

}, 0);
$.ajax({
url:'php/users/userstatus.php',
success:function(data){
$('.friends ol').html(data);
}
})
var refresh = setInterval(() => {
$.ajax({
url:'php/users/userstatus.php',
success:function(data){
$('.friends ol').html(data);
}
})
}, 3000);

    $('#friendsoff').on('click',function(){
$('.friends-btn-on').removeClass('friendsanime');
$('.friends-btn-off').removeClass('friendsanime');
$('.backcurtain').hide();
$('.friends').removeClass('friends-list-open');
clearInterval(refresh);
setTimeout(() => {
$('#friendson').show();
$('#friendsoff').hide();
}, 530);

})
})


    $('#submit-chat').on('click',function(){
let msg = $('#text-msg').val();
let username = $('.chat-msg-box h3').html();
$.ajax({
url:'php/chat/sent-chat.php',
type:'post',
data:{username:username,msg:msg},
success:function(){
    setTimeout(() => {
        $('.chat-msg-box').scrollTop($('.chat-msg-box ol')[0].scrollHeight);
        
    }, 200);
  
    
}
})
})

    
    

//END OF DOCUMENT//
})


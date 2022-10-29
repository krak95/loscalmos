$(document).ready(function(){
$('.play-maindiv').hide();
$('.form-signup').hide();
$('.form-login').hide();
$('.profile-div').hide();
$('#friendsoff').hide();
$('.success').css('display','none');
$('.error').css('display','none');

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

$('#loguname,#logpwd').on('keypress', function(event){
    if (event.key === "Enter") {
    event.preventDefault();
    $('#login-submit').click();
    }
})
    $('#login-submit').on('click',function(){
var username = $('#loguname').val();
var user_pwd = $('#logpwd').val();
$.ajax({
type:'post',
url:'php/users/login.php',
data:{username:username,user_pwd:user_pwd},
success: function(data){console.log(data)
    if(data == 'connect'){
        $('#login-submit').addClass('success');
        $('#login-submit').text('Success');
        //$('.success').css('display','flex');
        setTimeout(() => {
        $(location).prop('href','');
        }, 1500);
    }
    if(data == 'connection error'){
        $('#login-submit').addClass('error');
        $('#login-submit').text('Error');
        setTimeout(() => {
            $('#login-submit').removeClass('error');
            $('#login-submit').text('Login');
            }, 1500);
    }
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
setTimeout(() => {
$('.friends ol').html(data);
    
}, 5);
}
})
var refresh = setInterval(() => {
$.ajax({
url:'php/users/userstatus.php',
success:function(data){
    setTimeout(() => {
    $('.friends ol').html(data);
        
    }, 5);
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





//END OF DOCUMENT//
})


$(document).ready(function(){
    $('.play-maindiv').hide();
    $('.form-signup').hide();
    $('.form-login').hide();
    $('.profile-div').hide();
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
    $('#friends').on('click',function(){
        $('.friends').show();
        setInterval(() => {
        $.ajax({
            url:'php/users/userstatus.php',
            success:function(data){
                
                $('.friends ol').html(data);
                    
                
            }
        })
    }, 0);
    })

})


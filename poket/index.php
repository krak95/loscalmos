<?php
session_start();
$username = $_SESSION['username'] ?? null;
$ustat = $_SESSION['user_status'] ?? null;
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href='css/style.css' rel='stylesheet'>
<script src='js/library/jq.js'></script>
<title>Poket</title>
</head>
<body>
    <div>
    <?=$username?><br>
    <?=$ustat?>

    </div>
<button id ='friends'>show friends</button>
    <div class='friends'>
<ol>
    
</ol>
    </div>
<div class='screen'>
    <div id='return' class='return'><img src="img/return.png" alt=""></div>
<div class='mainmenu'>
<div>
<ol>
<li><img src="img/user.png" alt=""></li>
<li>Play</li>
<?php if(!isset($username)){
    ?>
    <li id='login'>Login</li>
    <li id='signup'>Sign up</li><?php
}else{ ?>
<li id='logout'>Logout</li>
<li id='profile'>Profile</li>
<?php } ?>
<li >Options</li>
</ol>
</div>
</div>

<div class='form-signup'>
    <div class='form-signup-container'>
        <ol>
            <li><label for="uname">Username:</label><input id='uname'  type="text"></li>
            <li><label for="email">Email:</label><input id='email'  type="text"></li>
            <li><label for="pwd">Password:</label><input id='pwd'  type="password"></li>
            <li><button class='signup-submit' id='signup-submit'>Sign up</button></li>
        </ol>
    </div>
</div>
<div class='form-login'>
    <div class='form-login-container'>
        <ol>
            <li><label for="uname">Username:</label><input id='loguname'  type="text"></li>
            <li><label for="pwd">Password:</label><input id='logpwd'  type="password"></li>
            <li><button class='login-submit' id='login-submit'>Login</button></li>
        </ol>
    </div>
</div>
<div class='profile-div'>
    <div class='profile-container'>
        <table>
            <tr>
                <td></td>
            </tr>
        </table>
    </div>
</div>
<!----------------------------------------------------------------------------------------------------------------------------------------->
<!----------------------------------------------------------------------------------------------------------------------------------------->
<!----------------------------------------------------------------------------------------------------------------------------------------->

<div class='play-maindiv'>
<div class='enemy-div'>
points:
<div class='enemy-points' id='enemy-points'>-</div>
</div>
<div class='my-menu'>
<div class='my-poket'>
<div class='my-poket-img'>
<img id='userimg' src="img/user.png" alt="">
</div>
</div>
<div class='play-div'>
<table>
<tr>
<td id='a1'>a</td>
<td id='a2'>b</td>
</tr>
<tr>
<td id='a3'>c</td>
<td id='a4'>d</td>
</tr>
</table>
</div>
</div>

</div>
</div>
</body>
</html>
<script src='js/js.js'></script>
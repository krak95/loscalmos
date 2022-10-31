<?php 
include "php/config/config.php";
session_start();
$ssuid=$_SESSION['user_id'] ?? null;
$username=$_SESSION['username'] ?? null;
$name=$_SESSION['name'] ?? null;
$email=$_SESSION['email'] ?? null;
$admin=$_SESSION['admin'] ?? null;
?>

<!DOCTYPE html>
<html lang="en">
<head>
<script src='js/library/jq.js'></script>
<script src='js/js.js'></script>
<link href='css/mystyle.css' rel='stylesheet' type='text/css'/>
<script>
topmenuselected();
loginform();
login();
reguser();
regform();
wrongform();
loggedin();
logout();
openshop();
navshop();
itempage();
addtocart();
cart();
changeavatar();
checkavatar();
putout();
quantity();
openadminfooter();
closeadminfooter();
additemadmin();
</script>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>E-Commerce</title>
</head>
<body>

<div style='display:none' class='sessionstat'><?= $_SESSION['username'] ?? null; ?></div>
</div>
<div class='topmenu'>
<ol>
<li><img src="php/img/icons/logo.png" alt=""> </li> 
    <?php if (!isset($_SESSION['username']))
{echo "<li id='topmenu-login'><img src='php/img/icons/user.png'>
    </li>";}
    else
    {echo "<li id='topmenu-user'><img src='php/img/icons/user.png'>
        </li>";} ?>
<li id='topmenu-shop' ><img src="php/img/icons/shop.png" alt=""></li>
<li id='topmenu-cart'><img src="php/img/icons/cart.png" alt=""></li>
</ol>
</div>

<div class='reg-div'>
<div class='reg-container'>
<div >
<ol>

</ol>

</div>
<div class='reg-container-form'>

<ol>

<li><p class='label-name'>Name:</p><p class='alert-'></p></li>
<li><input name='name' type='text'  id='reg-form-name' class='reg-form-name'></li>

<li><p class='label-email'>E-mail: </p><p class='alert-reg-mail'>This mail is not valid.</p></li>
<li><input name='email' onKeyDown="javascript: var keycode = keyPressed(event); if(keycode==32){ return false; }" type='text'  id='reg-form-mail' class='reg-form-email'></li>

<li><p class='label-uname'>Username: </p><p class='alert-reg-uname'>This username already exists.</p></li>
<li><input name='uname' onKeyDown="javascript: var keycode = keyPressed(event); if(keycode==32){ return false; }" type='text'  id='reg-form-uname' class='reg-form-username'></li>

<li><p class='label-pass'>Password:</p></li>
<li><input autocomplete="off" name='pwd' onKeyDown="javascript: var keycode = keyPressed(event); if(keycode==32){ return false; }" type='password'  id='reg-form-pass' class='reg-form-password'></li>

<li><button  id='reg-submit' class='reg-submit'>Submit registration</button></li>
<li > <p class='signupyes'> You were signed up!</p></li>
</ol>
</div>
</div>
</div>

<div class='login-div'>
<div class='login-container'>
<div class='login-container-form'>
<ol>

<li><p>Username:</p></li>
<li><input name='uname' id='login-uname' onKeyDown="javascript: var keycode = keyPressed(event); if(keycode==32){ return false; }" type="text"></li>
<li><p>Password:</p></li>
<li><input autocomplete="off" name='pwd' id='login-pass' onKeyDown="javascript: var keycode = keyPressed(event); if(keycode==32){ return false; }" type="password"></li>
<li><button  name='submit' class='login-btn' id='login-btn'>Login</button><button id='register'>Register</button></li>
</ol>
</div>
</div>
</div>

<div class='user-div'>
<div class='user-container'>
<ol>
<li>
<?php 
$sql = "SELECT * FROM users WHERE user_id = '$ssuid'";
$sql1 = $con->query($sql);
while($row = $sql1->fetch_assoc()){ 
$avatar = $row['avatar'];?>
<img class='tempo' style="max-height:100px;width:auto;" src="php/img/user-img/<?= $avatar; ?>"> <?php
}?>
</li><?php if($admin == 1){ ?>
<li><a class='openadmin-btn'><img src="php/img/icons/config.png" alt=""></a></li><?php } ?>
<li><p><?php echo $name ?></p></li>
<li><p><?php echo $email ?></p></li>
<li id='user_id' data-id='<?=$ssuid?>'><p><?php echo $ssuid ?></p></li>
<li class='avatar-menu-open'>Change avatar</li>
<li class='avatar-menu'>

<form action="php/img/user-img/imgup.php" method="post" enctype="multipart/form-data">
<input type='hidden' name='id' value='<?php echo $ssuid ?>'>
<input class='inputfile1' id='file1' type="file" name="file">
<label class='avatar-add-btn' for="file1">Adicionar imagem</label>
<button class='upload' type="submit" name="upload">Upload</button>
</form>

</li>
<li > <button class='logout' id='logout-btn'>Sign out</button> </li>
</ol>
</div>
</div>

<div class='shop-div'>
<div class='shop-container'>
<table class='shop-table' cellspacing="0" cellpadding="0">
<?php
$sql = 'SELECT * FROM items';
$sql1 = $con->query($sql);
while ($row = $sql1->fetch_assoc()){
$item_id = $row['item_id'];
$item_name = $row['item_name'];
$price = $row['price'];
$stock = $row['stock'];
$img = $row['img'];

?>
<tr data-id='<?=$item_id?>'>
<td>
<img <?php if(!isset($img)){ ?> 
    src='php/img/icons/close.png?=$img?>' <?php
}else{
    ?> src='php/img/item-img/<?=$img?>' <?php
} ?>  />

</td>
<td><?=$item_name?></td>
<td><?=$price . ' €'?></td>
<?php
switch($stock){
case 1:echo "<td class='stock-green'><div></div></td>";break;
case 2:echo "<td class='stock-yellow'><div></div></td>";break;
case 3:echo "<td class='stock-red'><div></div></td>";break;
}
?>

</tr>
<?php
} ?>
</table>
<div class='nav' id='nav'></div>
</div>
</div>

<div class='itempage'>
<div class='itempage-container'>
<ol></ol>
</div>
</div>

<div class='cart-div'>
<div class='cart-container'>
<table id='cart-container-table'>
</table>
<div>
<ol id='cartlist'>
</ol>
</div> 
</div>
</div>
<?php 
if($admin == 1){
?>
<div class='admin-div'>
    <div class='closeadmin-btn'><img src="php/img/icons/close.png" alt=""></div>
<div class='admin-container'>
    <div class='additem-div'>
<ol>
<li><h3>Add item</h3></li>
<li>
<label for="item-name">Name</label>
<input id='item-name' name='item-name' type="text">
</li>
<li>
<label for="price">Price</label>
<input id='price' name='price' type="text">
</li>
<li>
<label for="price">Stock</label>
<select name='stock' id='stock' name='stock' data-id='stock' type="option">
<option value="1">In stock.</option>
<option value="2">Low on stock.</option>
<option value="3">Out of stock.</option>
</select>
</li>
<li>
<button id='admin-additem'>Add item</button>
</li>
</ol>
</div>

<div></div>

</div>
</div>
<?php
}
?>
<div class='iteminfo'></div>
<div class='backcurtain'></div>
</body>
</html>
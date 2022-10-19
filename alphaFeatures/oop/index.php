<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href='css.css' rel='stylesheet' type='text/css'/>
<title>Document</title>
</head>
<body>
<div class='forms'>
 <div>
<div class='signup-form'>
  <?php 
  if(isset($_SESSION['username'])){
?>
<div><h3>Hello <?=$_SESSION['username']?></h3></div>
<form action="include/logout.php"><button type='submit'>Logout</button></form>
<?php
  }else{
    ?>
<form action="include/signup.php" method='post'>
  <div><h3>You can sign up here!</h3></div>
    <div>
<p>name</p>
<input placeholder='name' name='name' type="text">
</div>

    <div>
<p>uname</p>
<input placeholder='uname' name='uname' type="text">
</div>

    <div>
<p>email</p>
<input placeholder='email' name='email' type="text">
</div>

    <div>
<p>pw</p>
<input placeholder='pw' name='pw' type="password">
</div>

    <div>
<p>pwR</p>
<input placeholder='pwR' name='pwR' type="password">
</div>

    <div>
<button type='submit' name='submit'>Sign up</button>
</div>
</form>
    <?php
  }
  ?>


</div>
<?php 
  if(isset($_SESSION['username'])){
    
    }else{
      ?>
      
<div class='signin-form'>
<form action="include/login.php" method='post'>
  <div><h3>You can sign in here!</h3></div>
    <div>
<p>uname</p>
<input placeholder='uname' name='uname' type="text">
</div>
    <div>
<p>pw</p>
<input placeholder='pw' name='pw' type="password">
</div>
    <div>
<button type='submit' name='submit'>Sign in</button>
</div>
</form>
</div><?php
    } ?>
</div>
</div>
</body>
</html>
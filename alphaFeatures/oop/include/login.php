<?php
if(isset($_POST['submit']))
{
$uname = $_POST['uname'];
$pw = $_POST['pw'];

//Controller class
include "../classes/dbh-classes.php";
include "../classes/classes.php";
include "../classes/controller.php";
$login = new LoginControl($uname, $pw); //SignupControl comes from control-classes class SignupControl; 

//Errors
$login->loginUser();

//Redirect
header("location: ../index.php?error=none");

}
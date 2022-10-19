<?php

if(isset($_POST['submit']))
{
$name = $_POST['name'];
$uname = $_POST['uname'];
$email = $_POST['email'];
$pw = $_POST['pw'];
$pwR = $_POST['pwR'];

//Controller class
include "../classes/dbh-classes.php";
include "../classes/classes.php";
include "../classes/controller.php";
$signup = new SignupControl($name, $uname, $email, $pw, $pwR); //SignupControl comes from control-classes class SignupControl; 

//Errors
$signup->signupUser();

//Redirect
header("location: ../index.php?error=none");

}
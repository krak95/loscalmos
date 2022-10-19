<?php

$uname = $_POST['uname'];echo $uname;
$pwd = $_POST['pwd'];echo $pwd;

//Controller class
include "../db/dbh-classe.php";
include "../classes/login-class.php";
include "../classes/login-class-contr.php";
$login = new LoginControl($uname, $pwd); //SignupControl comes from control-classes class SignupControl; 

//Errors
$login->loginUser();

//Redirect

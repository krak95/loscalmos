<?php

$uname = $_POST['uname'];
$email = $_POST['email'];
$pwd = $_POST['pwd'];

//controller
include '../db/conn.php';
include '../classes/classes.php';
include '../classes/controller.php';

$signup = new SignupControl($uname,$email,$pwd);

$signup->signupUser();
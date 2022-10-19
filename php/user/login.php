<?php 
require '../config/config.php';
session_start();
$uname = $_POST['uname'];
$pass = $_POST['pass'];

$sql = 'SELECT * FROM users WHERE username = ?';
$sql1 = $con->prepare($sql);
$sql1->bind_param('s',$uname);
$sql1->execute();
$result = $sql1->get_result();
if ($result) {

while ($row = $result->fetch_assoc()) {
$username = $row['username'];
$hashedpass = $row['password'];
$email = $row['email'];
$name = $row['name'];
$admin = $row['admin'];
$user_id = $row['user_id'];
$avatar = $row['avatar'];
$checkedpass = (password_verify($pass, $hashedpass));
if($checkedpass){
$_SESSION['user_id'] = $user_id;
$_SESSION['name'] = $name;
$_SESSION['email'] = $email;
$_SESSION['admin'] = $admin;
$_SESSION['username'] = $username;
$_SESSION['avatar'] = $avatar;
}
}
}
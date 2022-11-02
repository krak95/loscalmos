<?php
require '../config/config.php';
if (!isset($_POST['uname'])) {
exit;
}
$uname = $_POST['uname'];
$pwd = $_POST['pwd'];
$sql = ("SELECT * FROM users WHERE username ='$uname'");
$sql1 = $con->prepare($sql);
$sql1->execute();
$result = $sql1->get_result();
if ($result) {
while ($row = $result->fetch_assoc()) {
$username = $row['username'];
$hashedpass   = $row['password'];
$email = $row['email'];
$name = $row['name'];
$admin = $row['admin'];
$result1 = (password_verify($pwd, $hashedpass));
if ($result1) {
echo "yes";
} else {
echo "no";
}
}
}
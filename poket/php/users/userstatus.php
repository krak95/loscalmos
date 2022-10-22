<?php
include '../config/config.php';

$sql= $con->query("SELECT username,user_status FROM users");
while ($row = $sql->fetch_assoc()){
    $uname = $row['username'];
    $ustat = $row['user_status'];
    ?>
    <li><?=$uname?></li>
    <li><?=$ustat?></li>
    <?php
}
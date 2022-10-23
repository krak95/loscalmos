<?php
include '../config/config.php';

$sql= $con->query("SELECT username,user_status FROM users");
while ($row = $sql->fetch_assoc()){
    $uname = $row['username'];
    $ustat = $row['user_status'];
    ?>
    <li>
      <?=$uname?>
    <?php
    switch($ustat) {
  case 0:
    $ustat = '0';
    echo '<span class="friendoff">offline</span>';
    break;
  case 1:
    $ustat = '1';
    echo '<span class="friendon">online</span>';
    break;
  } ?>
    </li>
    <?php
}
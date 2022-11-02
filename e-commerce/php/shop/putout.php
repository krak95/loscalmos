<?php
require '../config/config.php';
session_start();
$item_id = $_POST['item_id'];
$sql = 'DELETE FROM cart WHERE item_id = ?';
$sql1 = $con->prepare($sql);
$sql1->bind_param('s',$item_id);
$sql1->execute();
?>
<script>itemlist();</script>
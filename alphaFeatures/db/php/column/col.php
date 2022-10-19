<?php
require '../../config/config.php';

$table = $_POST['table'];
$db = $_POST['db'];

$sql = "SHOW COLUMNS FROM $table FROM $db";
$sql1  = $con->query($sql);

?><li data-id='<?=$db?>' id='tabletitle'><?=$table?></li><?php

while ($row = $sql1->fetch_array()){
?> 

<li><?=$row[0]?></li><?php
}?>
<script>datashow();</script>
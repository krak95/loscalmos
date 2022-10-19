<?php
require '../../config/config.php';

$db = $_POST['db'];

$sql = "SHOW TABLES FROM $db";
$sql1  = $con->query($sql);
?>  <li id='table'><?=$db?></li> <?php
while ($row = $sql1->fetch_array()){
?>

<li> <?=$row[0]?></li>

<?php
}?>
<script>colshow();</script>
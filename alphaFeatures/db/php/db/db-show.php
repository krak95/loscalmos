<?php
require '../../config/config.php';

$sql = 'SHOW DATABASES';
$sql1 = $con->query($sql);
?><li id='dbtitle'>Database <button id='newdb-btn'>NewDB</button></li><?php
while ( $row = $sql1->fetch_array()){
    ?>
    
    <li data-id2='<?=$row[0];?>'><?=$row[0];?><button class='deldb' data-id='<?=$row[0]?>'>Delete</button></li>
    <?php
}?>
<script>tableshow();dropdb();newdb();</script>
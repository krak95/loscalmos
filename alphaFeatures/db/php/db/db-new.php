<?php
$dbname = $_POST['dbname'] ?? null;

 $write=

'
<?php
require "../../config/config.php";
$sql = "CREATE DATABASE '.$dbname.'";
$sql1 = $con->query($sql);
';


$file = fopen('db-newblueprint.php', 'w');
	
 fwrite($file, $write);
 fclose($file);

 error_reporting(E_ALL);

require '../../config/config.php';

$sql = 'SHOW DATABASES';
$sql1 = $con->query($sql);
?><li>Database <button id='newdb-btn'>NewDB</button></li><?php
while ( $row = $sql1->fetch_array()){
    ?>
    
    <li data-id2='<?=$row[0];?>'><?=$row[0];?><button class='deldb' data-id='<?=$row[0]?>'>Delete</button></li>
    <?php
}?><script>dropdb();newdb();</script>
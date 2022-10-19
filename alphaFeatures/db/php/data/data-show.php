<?php
$dbname = $_POST['dbname'] ?? null;
$table = $_POST['table'] ?? null;
 $write=

'
<?php
require "../../config/config.php";
$sql = "SELECT * FROM '.$dbname.'.'.$table.'";
$sql1 = $con->query($sql);
$nrfields = mysqli_num_fields($sql1);
echo $nrfields;
while($row = $sql1->fetch_array()){

    
    print_r($row);

    
} ?>
';


$file = fopen('data-showblueprint.php', 'w');
	
 fwrite($file, $write);
 fclose($file);

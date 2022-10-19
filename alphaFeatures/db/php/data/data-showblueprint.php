
<?php
require "../../config/config.php";
$sql = "SELECT * FROM onlineshop. users";
$sql1 = $con->query($sql);
$nrfields = mysqli_num_fields($sql1);
echo $nrfields;
while($row = $sql1->fetch_array()){

    
    print_r($row);

    
} ?>

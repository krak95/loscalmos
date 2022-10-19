
<?php
require "../../config/config.php";
$sql = "SELECT * FROM onlineshop. users";
$sql1 = $con->query($sql);
$nrfields = mysqli_num_fields($sql1);
echo $nrfields."<br>";
$ALLDATA = array();

while($row = mysqli_fetch_array($sql1, MYSQLI_ASSOC)){
    

    array_push($ALLDATA, $row);
    ?>
    
    <tr>
    <td>
    <?php 
    print_r( $ALLDATA);
    ?>
    </td>
    </tr>
    
    <?php

} ?>

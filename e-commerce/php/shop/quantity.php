<?php
require '../config/config.php';
$qinp_val = $_POST['qinp_val'];
$qinp_id = $_POST['qinp_id'];

$sql = "SELECT cart.item_id, items.item_id, items.price FROM cart INNER JOIN items ON cart.item_id = items.item_id AND cart.item_id = ?";
$sql1 = $con->prepare($sql);
$sql1->bind_param('s',$qinp_id);
$sql1->execute();
$result = $sql1->get_result();
while($row = $result->fetch_assoc()){
    $item_id = $row['item_id'];
    $price = $row['price'];
    if(empty($qinp_val)){
        echo '0 €';
        }else{
            $price_final = $price * $qinp_val;
            echo number_format($price_final,2). ' €';
        }
    $sql2 = 'UPDATE cart SET price_final = ?, quantity = ? WHERE item_id = ?';
    $sql3 = $con->prepare($sql2);
$sql3->bind_param('sss',$price_final,$qinp_val,$item_id);
$sql3->execute();


}
?>
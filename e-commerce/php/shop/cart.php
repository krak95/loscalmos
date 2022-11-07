<?php 
require '../config/config.php';
session_start();
$uname = $_SESSION['username'] ?? null;
if( $uname !=''){
$sql = 'SELECT cart.item_id, items.price, items.item_name, items.img,items.stock FROM cart
INNER JOIN items ON cart.item_id = items.item_id
AND cart.username = ?';

$sql1 = $con->prepare($sql);
$sql1->bind_param('s',$uname);
$sql1->execute();
$result = $sql1->get_result();
while ($row = $result->fetch_assoc()){
    $item_id = $row['item_id'];
    $img = $row['img'];
    $item_name = $row['item_name'];
    $item_price = $row['price'];
    $stock = $row['stock'];
    $price_final = $item_price;
if (empty($quantidade)){
$quantidade = '1';
}
?>
<tr>
<td><img src='php/img/item-img/<?=$img?>' /></td>
<td><?=$item_name?></td>
<td><?=$item_price?> €</td>
<td><input oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" value='<?=$quantidade?>' data-id='<?=$item_id?>' class='quantity-inp' id='quantity-inp<?=$item_id?>' type="text"></input></td>
<td class='finalprice<?=$item_id?>'><?=number_format($price_final,2)?> €</td>
<td><button data-id='<?=$item_id?>' class='putout'>Put out</button></td>
</tr>
<?php
}
}else{
echo 'Login first';
}
?>

<script>putout();quantity();itemlist();</script>
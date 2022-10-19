<?php
require_once '../config/config.php';
session_start();
$uname = $_SESSION['username'] ?? null;

$sql = "SELECT cart.item_id, cart.price_final, cart.quantity, items.item_id, items.item_name, items.price FROM cart INNER JOIN items ON cart.item_id = items.item_id INNER JOIN users ON cart.username=users.username AND users.username = ?";
$sql1 = $con->prepare($sql);
$sql1->bind_param('s',$uname);
$sql1->execute();
$result = $sql1->get_result();
while ($row = $result->fetch_assoc()){
    $item_id = $row['item_id'];
    $item_name = $row['item_name'];
    $quantity = $row['quantity'];
    $item_price = $row['price'];
    $price_final = $row['price_final'] . ' €';

    /*$price_final = $row['price_final'].' €';*/
    if(empty($quantity)){
        $quantity =0;

    }
    $price_final = number_format($item_price * $quantity,2) . ' €';

    $sqlsum = 'SELECT SUM(price_final) as price_final1 FROM cart WHERE username=?';
    $sqlsum1 = $con->prepare($sqlsum);
    $sqlsum1->bind_param('s',$uname);
    $sqlsum1->execute();
    $result1 = $sqlsum1->get_result();
    while ($row = $result1->fetch_assoc()){
        $sum = $row['price_final1'] . ' €';
        
        ?>
  <li style='display:flex;justify-content:space-between;'><p><?=$item_name?></p><p><?=$price_final?></p></li>
    
    <?php } }
    ?>
<li style='display:flex;justify-content:space-between;margin-top:100px;'><p>Total:</p><p><?=$sum ?? null?></p></li>
   

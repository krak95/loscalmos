<?php
require '../config/config.php';
session_start();

$uname = $_SESSION['username'];

$sql = 'SELECT * FROM recordorder WHERE username = ?';
$sql1 = $con->prepare($sql);
$sql1->bind_param('s',$uname);
$sql1->execute();
$result = $sql1->get_result();
?>
<table>
<th>Order nº</th>
<th>Item name</th>
<th>Quantity</th>
<th>Price</th>
<?php
while ($row = $result->fetch_assoc())
{
    $order_id = $row['order_id'];
    $price = $row['price_final'];
    $item_name = $row['item_name'];
    $quantity = $row['quantity'];
?>
<tr>
    <td><?=$order_id?></td>
    <td><?=$item_name?></td>
    <td><?=$quantity?></td>
    <td><?=$price?></td>
</tr>


<?php
}
?>
</table>
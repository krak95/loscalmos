<?php
include '../config/config.php';
$item = $_POST['item'];
$price = $_POST['price'];
$stock = $_POST['stock'];

$sql = $con->prepare('INSERT INTO items (item_name,price,stock) VALUES(?,?,?)');
$sql->bind_param('sss',$item,$price,$stock);
$sql->execute();

if($sql){
    
$sql = 'SELECT * FROM items';
$sql1 = $con->query($sql);
while ($row = $sql1->fetch_assoc()){
$item_id = $row['item_id'];
$item_name = $row['item_name'];
$price = $row['price'];
$stock = $row['stock'];
$img = $row['img'];

?>
<tr data-id='<?=$item_id?>'>
<td>
<img src='php/img/item-img/<?=$img?>' />

</td>
<td><?=$item_name?></td>
<td><?=$price . ' €'?></td>
<?php
switch($stock){
case 1:echo "<td class='stock-green'><div></div></td>";break;
case 2:echo "<td class='stock-yellow'><div></div></td>";break;
case 3:echo "<td class='stock-red'><div></div></td>";break;
}
?>

</tr>
<?php
}
}
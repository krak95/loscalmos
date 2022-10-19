<?php 
require '../config/config.php';

$sql = 'SELECT * FROM produtos';
$sql1 = $con->query($sql);
while ($row = $sql1->fetch_assoc()){
    $id = $row['id'];
    $item = $row['item'];
    $quantidade = $row['quantidade'];
    $price = $row['price'];
    $stock = $row['stock'];
    $img = $row['img'];

    ?>
        <tr>
        <td><?=$id?></td>
        <td><?=$item?></td>
        <td><?=$quantidade?></td>
        <td><?=$price?></td><?php
        switch($stock){
        case 1:"<td class='stock-green'></td>";break;
        case 2:"<td class='stock-yellow'></td>";break;
        case 3:"<td class='stock-red'></td>";break;
    }
    ?>
        <td><?=$img?></td>
    </tr>
     <?php
} ?>

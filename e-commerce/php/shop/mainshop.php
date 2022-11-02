<?php 
require '../config/config.php';

$sql = 'SELECT * FROM items';
$sql1 = $con->query($sql);
?>
<table class='shop-table'  cellspacing="0" cellpadding="0">
<?php
while ($row = $sql1->fetch_assoc()){
    $item_id = $row['item_id'];
    $item_name = $row['item_name'];
    $price = $row['price'];
    $stock = $row['stock'];
    $img = $row['img'];
    
    ?>
    <tr data-id='<?=$item_id?>'>
    <td>
    <img <?php if(!isset($img)){ ?> 
        src='php/img/icons/close.png?=$img?>' <?php
    }else{
        ?> src='php/img/item-img/<?=$img?>' <?php
    } ?>  />
    
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
    } ?>
</table>
<div class='nav' id='nav'></div>
<script>addtocart();itempage();navshop();</script>

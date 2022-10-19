<?php 
require '../config/config.php';
session_start();
$item_id = $_POST['item_id'];
$admin = $_SESSION['admin'];
$sql = 'SELECT * from items WHERE item_id = ?';
$sql1 = $con->prepare($sql);
$sql1->bind_param('s',$item_id);
$sql1->execute();
$result = $sql1->get_result();
while ($row = $result->fetch_assoc()){
    $item_id = $row['item_id'];
    $item_name = $row['item_name'];
    $price = $row['price'];
    $stock = $row['stock'];
    $img = $row['img'];
    if ($admin != '1'){
    ?>
        <li><img src='php/img/item-img/<?=$img?>' /></li>
        <li><?=$item_name?></li>
        <li>Preço: <?=$price?> €</li>
        <li>Stock:
        <?php
switch($stock){
case 1:echo "<li class='stock-green'><div></div></li>";break;
case 2:echo "<li class='stock-yellow'><div></div></li>";break;
case 3:echo "<li class='stock-red'><div></div></li>";break;
}
?>
            <li><button data-id='<?=$item_id?>' id='addtocart' class='carrinho-img'>Add to cart</button></li>
    </li>
<?php 
}else{
    ?>
        <li><img src='php/img/item-img/<?=$img?>'/>
                    
<form action="php/img/item-img/imgitemup.php" method="post" enctype="multipart/form-data">
<input type='hidden' name='itemid' value='<?=$item_id?>'/>
<input class='inputfile1' id='itemfile' type="file" name="itemfile"/>
<label class='avatar-add-btn' for="itemfile">Adicionar imagem</label>
<button class='upload' type="submit" name="uploaditem">Upload</button>
</form>
    </li>
        <li><?=$item_name?></li>
        <li>Preço: <?=$price?> €</li>
        <li>Stock:
        <?php
switch($stock){
case 1:echo "<li class='stock-green'><div></div></li>";break;
case 2:echo "<li class='stock-yellow'><div></div></li>";break;
case 3:echo "<li class='stock-red'><div></div></li>";break;
}
?>
              <li><button class='addto-cart' data-id2='<?=$item_name?>' data-id='<?=$item_id?>' id='addtocart' class='carrinho-img'>Add to cart</button></li>
    </li>
    <?php
}
}
?>
<script>addtocart();</script>


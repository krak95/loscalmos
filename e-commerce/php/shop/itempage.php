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
?>
<div class='itempage' id='itempage'>
<div class='itempage-container'>
<?php

while ($row = $result->fetch_assoc()){
$item_id = $row['item_id'];
$item_name = $row['item_name'];
$price = $row['price'];
$stock = $row['stock'];
$img = $row['img'];
if ($admin != '1'){
?>
<div class='item-img'><img src='php/img/item-img/<?=$img?>' /></div>
<div class='item-header'><?=$item_name?></div>
<div class='item-price'><?=$price?> €</div>
<div class='item-stock'>
<?php
switch($stock){
case 1:echo "<div class='stock-green'><div></div></div>";break;
case 2:echo "<div class='stock-yellow'><div></div></div>";break;
case 3:echo "<div class='stock-red'><div></div></div>";break;
}
?>
</div>
<div class='item-add'>
<button data-id='<?=$item_id?>' id='addtocart' class='carrinho-img'><img src="php/img/icons/cart.png" alt=""></button>
<button class='itempage-back-btn'><img src="php/img/icons/back.png" alt=""></button>
</div>

<?php 
}else{
?>
<div class='item-img'><img src='php/img/item-img/<?=$img?>'/>

<form action="php/img/item-img/imgitemup.php" method="post" enctype="multipart/form-data">
<input type='hidden' name='itemid' value='<?=$item_id?>'/>
<input class='inputfile1' id='itemfile' type="file" name="itemfile"/>
<label class='avatar-add-btn' for="itemfile">Adicionar imagem</label>
<button class='upload' type="submit" name="uploaditem">Upload</button>
</form>
</div>
<div class='item-header'><?=$item_name?></div>
<div class='item-price'>Preço: <?=$price?> €</div>
<div class='item-stock'>Stock:
<?php
switch($stock){
case 1:echo "<div class='stock-green'><div></div></div>";break;
case 2:echo "<div class='stock-yellow'><div></div></div>";break;
case 3:echo "<div class='stock-red'><div></div></div>";break;
}
?>
<div class='item-add'><button class='addto-cart' data-id2='<?=$item_name?>' data-id='<?=$item_id?>'id='addtocart' class='carrinho-img'><img src="php/img/icons/cart.png" alt=""></button>
<button class='itempage-back-btn'><img src="php/img/icons/back.png" alt=""></button></div>
</div>
<?php
}
}

?>
<script>addtocart();itempage();</script>
</div>
</div>



<?php
require 'config/config.php';

$classn = $_POST['classn'];
$id = $_POST['id'];

$sql = "DELETE FROM $classn WHERE id=? ";
$query = $con->prepare($sql);
$query->bind_param('s',$id);
$query->execute();

if($query){
    $sql1 = "SELECT * FROM $classn";
    $result = $con->query($sql1);
    ?>
    <h1><?php echo $classn ?></h1><?php
    while ($row = $result->fetch_assoc()) {
        $data = $row['data'];
        $entrega = $row['entrega'];
        $id = $row['id'];
    
        $timeformat = mktime(date("H"), date("i"), date("s"), date("m") ,date("d"), date("Y"));
        $time = date("Y-m-d H:i:s",$timeformat);
        $data0 = strtotime($data);
        $date1 = date("Y-M-d H:i:s", $data0);
    
        $timeleft1 = strtotime($data) - $timeformat;
        $time1 = (($timeleft1 / 60)/60)/24;
        $timeleft = round($time1);
        ?>
        <ol>
    
        <li>
        <h2>Trabalho: </h2><p><?php echo $entrega; ?></p>
        </li>
    
        <li>
        <h2>Data: </h2><p><?php echo $date1; ?></p>
        </li>
    
        <?php
    if($timeleft <= 2){ ?>
    
        <li >
        <h2>Faltam: </h2><p style='color:crimson'><?php echo $timeleft.' dias'; ?></p>
        </li>
    
    <?php }
    elseif($timeleft <= 7 && $timeleft > 2){ ?>
    
        <li>
        <h2>Faltam: </h2><p  style='color:yellow'><?php echo $timeleft.' dias'; ?></p>
        </li>
    
        <?php
    }else{?>
    
        <li >
        <h2>Faltam: </h2><p style='color:green'><?php echo $timeleft.' dias'; ?></p>
        </li>
    
    <?php } ?>
    <li><button data-id='<?php echo $id; ?>' class='apagartarefa' id='apagartarefa'>Apagar</button></li>
        </ol>
       
    <?php }  ?>
    
     <ol>
     <li><input type="date" id='data'></li>
     <li><input type="text" id='trabalho'></li>
     <li><button id='addtarefa'>Adicionar tarefa</button></li>
    </ol>
    
    <div class='footer'></div>
    
        <?php } ?>
    <script>addtarefa();deltarefa();</script>
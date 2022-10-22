<?php
include '../config/config.php';
session_start();
$username = $_SESSION['username'];

$sql= $con->prepare("SELECT users.username,users.user_email,users.poket_id,
pokets.poket_name,pokets.poket_points,pokets.move_id,
poketmoves.move_name,poketmoves.move_val
 FROM users 
 INNER JOIN pokets ON users.poket_id=pokets.poket_id 
 INNER JOIN poketmoves ON pokets.move_id = poketmoves.move_id
 AND username = ?");
$sql->bind_param('s',$username);
$sql->execute();
$result = $sql->get_result();
while($row = $result->fetch_assoc()){
    ?>
    <table>
        <tr>
            <th>username</th>
            <th>user_email</th>
            <th>poket_name</th>
            <th>poket_points</th>
            <th>move_id</th>
        </tr>
        <tr>
            <td><?=$row['username']?></td>
            <td><?=$row['user_email']?></td>
            <td><?=$row['poket_name']?></td>
            <td><?=$row['poket_points']?></td>
            <td><?=$row['move_name']?> = <?=$row['move_val']?></td>
        </tr>
    </table>

    <?php
}
/*SELECT column_name(s)
FROM table1
INNER JOIN table2
ON table1.column_name = table2.column_name;*/
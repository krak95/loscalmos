<?php
include 'php/config/config.php';
session_start();
$username = $_SESSION['username'] ?? null;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='css/play.css' rel='stylesheet'>
<script src='js/library/jq.js'></script>
<script src='js/play.js'></script>
    <title>Document</title>
</head>
<body>
    <?php 
    $sql= $con->query("SELECT username FROM users");
    while($row = mysqli_fetch_assoc($sql)){
        $user = $row['username'];
        ?>
    <div class='char' id="char<?=$user?>"><img src="img/user.png" alt=""></div>
    <?php
    }
    ?>
    <div class='char<?=$username?> char' id="char<?=$user?>"><img src="img/user.png" alt=""></div>
    
</div>
</body>
</html>

<script>
    $(document).ready(function(){

var pane = $('body'),
box = $('.char<?=$username?>'),
box2 = $('.box2'),
w = pane.width() - box.width(),
d = {},
x = 2;

function newv(v,a,b) {
var n = parseInt(v, 10) - (d[a] ? x : 0) + (d[b] ? x : 0);
return n < 0 ? 0 : n > w ? w : n;
}

$(window).keydown(function(e) { d[e.which] = true; });
$(window).keyup(function(e) { d[e.which] = false; });

setInterval(function() {
box.css({
    left: function(i,v) { return newv(v, 37, 39); },
    top: function(i,v) { return newv(v, 38, 40); }

});
}, 0);
})
</script>
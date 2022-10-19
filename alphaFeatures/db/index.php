<?php 
require 'config/config.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Document</title>
<script src='js/library/jq.js'></script>
<script src='js/js.js'></script>
<script>
tableshow();
dbshow();
dropdb();
datashow();
</script>
<link href='css/style.css' rel='stylesheet' >
</head>
<body>

<div class='newdb-div'>
    <div class='newdb-container'>
        <ol>
            <li>Database name</li>
            <li><input class='dbname' type="text"></li>
            <li><button class='newdb-create-btn'>Create</button></li>
        </ol>
    </div>
</div>

<div class='confirm'>
<div class='confirm-container'>
    <ol>
        <li><p>Are you sure you want to delete database?</p></li>
        <li><button>Yes</button><button>No</button></li>
</ol>
</div>
</div>
<div class='backcurtain'></div>

<div class='global-div'>

<div class='database-show'>
<div class='database-show-container'>
<ol></ol>
</div>
</div>

<div class='tables-show'>
<div class='tables-show-container'>
<ol></ol>
</div>
</div>

<div class='col-show'>
<div class='col-show-container'>
<ol></ol>
</div>
</div>

<div class='data-show'>
<div class='data-show-container'>
<table></table>
</div>
</div>


</div>



</body>
</html>
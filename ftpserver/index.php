<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href='css/style.css' rel='stylesheet'>
<script src="jquery/jq.js"></script>

<title>FTP-API</title>
</head>
<body>
<div class='firstdiv'>
    <h3>FTP-API</h3>
<div class='files-container'>
<ol>

<?php
$path    = 'files';
if ($handle = opendir($path)) {
while (false !== ($file = readdir($handle))) {
if ('.' === $file) continue;
if ('..' === $file) continue;
?>
<li class='download' data-id='<?=$path?>\<?=$file?>'> <?=$file?> </li>
<?php }
closedir($handle);
}
?>
</ol>
</div>
</div>
</body>
</html>
<script>
$(document).ready(function(){
$('.download').on('click',function(){
let el = this;
let path = $(el).data('id');
$.ajax({
url:'download.php/'+path,
type:'get',
data:{path:path},
success:function(data){
    window.location.replace(path);
}
})
})
}
)
</script>
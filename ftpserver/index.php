<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href='css/style.css' rel='stylesheet'>
<script src="jquery/jq.js"></script>
<script src="jscript/script.js"></script>
<script>$(document).ready(function(){
download()
}) </script>
<title>FTP-API</title>
</head>
<body>
<div class='firstdiv'>
    <h3>FTP-API</h3>
    <div class="routing"></div>
    <div class='files-container'>
    <?php
$path   = 'files';
?>
<table id='mylastroute' data-id='<?=$path?>'>
<th>Name</th>
<th>Size</th>

<?php
if ($handle = opendir($path)) {
while (false !== ($file = readdir($handle))) {
if ('.' === $file) continue;
if ('..' === $file) continue;
$filesize = filesize('files/'.$file);

if ($filesize >= 1073741824)
        {
            $filesize = number_format($filesize / 1073741824, 2) . ' GB';
        }
        elseif ($filesize >= 1048576)
        {
            $filesize = number_format($filesize / 1048576, 2) . ' MB';
        }
        elseif ($filesize >= 1024)
        {
            $filesize = number_format($filesize / 1024, 2) . ' KB';
        }
        elseif ($filesize > 1)
        {
            $filesize = $filesize . ' bytes';
        }
        elseif ($filesize == 1)
        {
            $filesize = $filesize . ' byte';
        }
        else
        {
            $filesize = '0 file';
        }
?>
<tr class='download'  data-id='<?=$path?>\<?=$file?>' data-id2='<?=$file?>'>
<td> <?=$file?> </td>
<td> <?=$filesize?></td>
</tr>
<?php }
closedir($handle);
}
?>
</table>
</div>
</div>
</body>
</html>
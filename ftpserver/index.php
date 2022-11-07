<?php
$path   = 'files';
?>
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
download();
}) </script>
<title>FTP-API</title>
</head>
<body>
    <div class='firstdiv'>
        <div class='first-container'>
    <div><h1>FTP-API</h1></div>
    <div class="routing"></div>
    <div class='files-container'>

<div class="currentfolder" data-id='<?=basename($path)?>'>You are in <span><?=basename($path)?></span> folder.</div>
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

<div class="upload-div" method="post" enctype="multipart/form-data">
    <div class="upload-container">
    <form action="upload.php" method='post' enctype="multipart/form-data">
    <input type="file" id="file-toupload" name="file-toupload">
    <button id="upload">upload</button>
    </form>

    </div>
</div>

</div>
</body>
</html>
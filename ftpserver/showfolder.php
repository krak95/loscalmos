<script>
download()
</script>

<?php
$path = $_POST['path'];
?>
<table id='mylastroute' data-id='<?=$path?>'>
<th>Name</th>
<th>Size</th>

<?php
if ($handle = opendir($path)) {
while (false !== ($file = readdir($handle))) {
if ('.' === $file) continue;
if ('..' === $file) continue;
$filesize = filesize($path.'/'.$file);

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
<tr class='download' data-id='<?=$path?>\<?=$file?>'>
<td> <?=$file?> </td>
<td> <?=$filesize?></td>
</tr>
<?php }
closedir($handle);
}
?>
</table>

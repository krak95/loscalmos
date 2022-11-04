<?php
$filename =  $_POST['path'];
$file_parts = pathinfo($filename);
$filetype = $file_parts['extension']??null;
if($filetype == null){
    die('folder');
}
?>
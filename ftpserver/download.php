<?php
$filename =  $_POST['path'];
if (file_exists($filename)) {
    header('Content-Type: application/zip');
    header('Content-Disposition: attachment; filename="'.basename($filename).'"');
    header('Content-Length: ' . filesize($filename));
  
    flush();
    readfile($filename);
}
?>


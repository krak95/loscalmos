<?php
$target_dir = "";
$file = $_POST['file'];
echo basename($file);
$target = $target_dir.
$uploadOk = 1;
move_uploaded_file(basename($file), $target_dir)
?>
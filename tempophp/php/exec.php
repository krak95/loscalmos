<?php

if(isset($_POST['submit'])){

    $name_p = $_POST['name'];
    $age_p = $_POST['age'];

    include "exec.php";

$create = new Create($name_p,$age_p);

}
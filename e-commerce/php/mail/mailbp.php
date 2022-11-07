<?php
require_once '../config/config.php';
session_start();
$email = $_SESSION['email'];
$uname = $_SESSION['username'];
?>

<div class="email-div">
    <?=$email?>
    <?=$uname?>
</div>

<style>

*{
    padding:0;
    margin:0;
    font-family:Arial, Helvetica, sans-serif;
}
:root 
{
--dblue: #38435E;
--blue: #84A0DF;
--bblue:#CAD2E3;
--blue2:#657AAB;
--grey:#54575E;
--greenlight:rgb(0, 255, 0);
--lowgreen:rgb(198, 255, 198);
}
.email-div
{
    background-color: var(--bblue);
}
</style>

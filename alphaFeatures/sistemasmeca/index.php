<?php
require 'php/config/config.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src='js/js.js' type="text/javascript"></script>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>

<div>
    <div class='topmenu'>
        <button data-id='pti'>Segunda<br><br>PTI</button>
        <button data-id='psp'>Terça<br><br>PSP</button>
        <button data-id='sap'>Quarta<br><br>SAP</button>
        <button data-id='rsp'>Quinta<br><br>RSP</button>
        <button data-id='fac'>Sexta<br><br>FAC</button>
    </div>
    <div class='mainevent'>
        <div class='main-container'>
        </div>
    </div>

    <div class='side-menu'>
                <ol>
                    <li id='entregatestes'>
                    Entregas e testes   
                    </li>
                    <li id=''>
                    
                    </li>
                </ol>
            </div>

            <div id='backcurtain' class='backcurtain'>
            </div>
</div>

<script>disci();sidemenu();addtarefa();deltarefa();</script>
</div>
</body>
</html>
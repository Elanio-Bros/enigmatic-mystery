<?php
require_once "private/class/user.php";
require_once "private/SimulatedBD.php";
session_start();
$bd=new BancoDeDados('raking');
$user = $_SESSION['user'];
$bd->prepare($bd->InsertRaking());
foreach ($user->getAllDados() as $key => $value) {
    echo $value;
    $bd->bindValue($key,$value);
}
$bd->execute();
?>
<DOCTYPE html>
    <html lang="pt-br">

    <head>
        <meta charset="utf-8">
        <title>Enigmas</title>
        <link rel="shortcut icon" type="image/x-icon" href="img/icon.png">
        <link rel="stylesheet" type="text/css" href="style/point.css">
        <script src="script/script.js"></script>
    </head>

    <body>
        <h1>Parabéns USUARIO finalizou um de vários Engimas no Modo:</h1>
        <h1>Menu</h1>
        <h1>Sua pontuação foi: 1500 Pontos</h1>
        <h1> <span name="record">Um Novo Record</span></h1>
        <!-- <h1>200 Boa</h1>
    <h1>150 Mediano</h1>
    <h1>100 Facil</h1> -->

    </body>

    </html>
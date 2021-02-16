<?php
require_once "private/class/user.php";
require_once "private/SimulatedBD.php";
session_start();
if (isset($_SESSION['user'])) {
    $bd = new BancoDeDados('raking');
    $user = $_SESSION['user'];
    $dados = $user->getAllDados();
    $bd->prepare($bd->InsertRaking());
    foreach ($dados as $key => $value) {
        $bd->bindValue($key, $value);
    }
    $bd->execute();
    session_unset();
    session_destroy();
} else {
    header('Location:.');
}
?>
<DOCTYPE html>
    <html lang="pt-br">

    <head>
        <meta charset="utf-8">
        <title>Enigmas</title>
        <link rel="shortcut icon" type="image/x-icon" href="img/icon.png">
        <link rel="stylesheet" type="text/css" href="style/point.css">
        <link rel="stylesheet" type="text/css" href="style/raking.css">
        <script src="script/script.js"></script>
    </head>

    <body>
        <h1>Parabéns <?= $dados[0] ?> finalizou um de vários Engimas no Modo:</h1>
        <h1 id="modo"></h1>
        <h1>Sua pontuação foi: <?= $dados[3] ?></h1>
        <?php if ($dados[3] >= 10) { ?>
            <h1><span name="record">Parabéns 👏👏👏👏👏</span></h1>
        <?php } else if ($dados[3] > 0 && $dados[3] > 10) { ?>
            <h1><span name="record">Boa tente melhorar na proxima 🤗🤗🤗🤗🤗</span></h1>
        <?php } else if ($dados[3] == 0) { ?>
            <h1><span name="record">Tente mais da proxima vez 😥😥😥😥😥</span></h1>
        <?php } ?>
        </button> <a class="btnBack" href="./">Voltar</a>
    </body>
    <script>
        document.getElementById('modo').innerHTML = levelConvert(<?= $dados[1] ?>)
    </script>
    <script>
        setInterval(function() {
            window.location.href = "./";
        },20000);
    </script>

    </html>
<?php
//private
include_once "enigmas_query.php";
include_once "user.php";
session_start();
if (isset($_SESSION['user'])) {
    $enigma = $_SESSION['enigma'];
    $user = $_SESSION['user'];
} else {
    header('Location:.');
}
?>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <title><?= $enigma->getTitle($user->getFase()) ?></title>
    <link rel="stylesheet" type="text/css" href="style/font/font.css">
    <link rel="stylesheet" type="text/css" href="style/riddles.css">
    <script src='script/requisitions.js'></script>
</head>

<body style="background-color:black" onload="respostaToggle()">
    <div id="enigima">
        <form action="proxima.php" method="POST">
            <?= $enigma->structures($user->getFase()) ?>
            <div id='alert'></div>
            <div id='resposta'>
                <input type="text" class='respostaInpt' name='rsp'>
                <input type="submit" value='Verificar' class='respostaBtn'>
            </div>
            <div id="btnPerguntas">
                <button type='button' class="btn btnResposta" onclick="respostaToggle()">Responder</button>
                <button type='button' class="btn btnDicas">Dica</button>
                <button type='button' class="btn btnNaoSei" name='rsp' value='nsi'>Não Sei</button>
            </div>
        </form>
    </div>
</body>

</html>
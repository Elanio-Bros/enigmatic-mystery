<?php
//private
include_once "private/class/journal_formate.php";
include_once "private/class/user.php";
session_start();
if (isset($_SESSION['user'])) {
    $journal = $_SESSION['journal'];
    $user = $_SESSION['user'];
    $user->resetDica();
} else {
    header('Location:.');
}
?>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <title><?=$journal->getTitle(); ?></title>
    <link rel="stylesheet" type="text/css" href="style/font/font.css">
    <link rel="stylesheet" type="text/css" href="style/riddles.css">
    <script src='script/requisitions.js'></script>
</head>

<body onload="respostaToggle()">
    <div id="enigima">
        <?php if(isset($_GET['err']) && $_GET['err']=='rsp'){ ?>
            <div id='alert'>Respota Errada</div>
        <?php } ?>
        <?='Teste'?>
        <form action="check_answer.php" method="POST">
            <div id='dica'></div>
            <div id='resposta'>
                <input type="text" class='respostaInpt' name='rsp'>
                <input type="submit" value='Verificar' class='respostaBtn'>
            </div>
            <div id="btnPerguntas">
                <button type='button' class="btn btnResposta" onclick="respostaToggle()">Responder</button>
                <button type='button' class="btn btnDicas" onclick="btnDica()">Dica</button>
                <button type='submit' class="btn btnNaoSei" name='nsi' value='nsi'>Não Sei</button>
            </div>
        </form>
    </div>
</body>

</html>
<?php 
include_once "functionsEnigimas.php";
include_once "user.php";
session_start();
if(isset($_SESSION['user'])){
$coisas=arguments($_SESSION['user']->__get('fase'));
$singleMedia=$coisas['media'];
$link=links();
}else{
    header('Location:/PCC');//subistituir
}
?>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <title><?=$coisas['title']?></title>
    <link rel="stylesheet" type="text/css" href="style/font/font.css">
    <link rel="stylesheet" type="text/css" href="style/riddles.css">
    <script src='script/request.js'></script> 
</head>
<body style="background-color:black">
    <div id="enigima">
        <?php if(strpos($singleMedia,'f')!==false){?><div><img class="img" src=<?php echo $link['foto']?>></div><br/><?php } ?>
        <?php if(strpos($singleMedia,'v')!==false){?><div><video class ="img" src=<?php echo $link['video']?> preload="auto" controls controlslist="nodownload"></video></div><br/><?php } ?>
        <?php if(strpos($singleMedia,'a')!==false){?><div><audio class ="audio" src=<?php echo $link['audio']?> preload="auto" controls controlslist="nodownload"></audio></div><?php } ?>
        <div class="text"><?=$coisas['text']?></div>
        <form action="proxima.php" method="POST">
            <div id="btnPerguntas">
                <button type='submit' name='rsp' class="btn btnResposta" value='Ola'>Responder</button>
                <button class="btn btnDicas">Dica</button>
                <button class="btn btnNaoSei" type='submit' name='rsp' value='nsi'>Não Sei</button>
            </div>
        </form>
    </div>
</body>
</html>
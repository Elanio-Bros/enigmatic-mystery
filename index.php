<?php
session_start();
session_destroy();
?>
<DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <title>Enigmas</title>
    <link rel="stylesheet" type="text/css" href="style/index.css">
    <script src="script/script.js"></script>
</head>
<body>

    <!-- video Fundo -->
    
    <!-- video Fundo Fim -->

    
    <!-- alert -->
        <div id="alert" style="display:none">
                <div id="msg">Mensagem</div>
                <div id="x" onClick="x()">x</div>
        </div>
    <!-- alert end-->
    
    <!--menu-->
    <div id="selecao">
        <div class="form">
            <form name="form" action="validar.php" method="POST">
                <input type="text" class="input" name="nickname" placeholder="Digite um Nickname">
                <select class="input" style="margin:15px;" name="nivel" >
                    <option value="">Selecione o Nível</option>
                    <option value="1">&#128512; Muito Fácil</option>
                    <option value="2">&#128513; Fácil</option>
                    <option value="3">&#128523; Médio</option>
                    <option value="4">&#128526; Difícil</option>
                    <option value="5">&#128545; Muito Difício</option>
                </select>

                <div class='radiosBtn'>
                    <div id="radioPR" title="Essa opção é para perguntas e respotas" onclick="toogleRadio(0)">
                        <input type='radio' class="ocultar" name='tipo' value='PR'>
                        <label class='label'>Perguntas</label>
                    </div>
                    <div id="radioR" title="Essa opção é para roteiro"  onclick="toogleRadio(1)">
                        <input type='radio' class="ocultar" name='tipo' value='RT'>
                        <label class='label'>Roteiro</label>
                    </div>
                </div>

                <button class="input btnComecar" onClick="return checkForm()">Começar</button>
            </form>
        </div>
        <div id="btnRS">
            <button class="btnRaking btn" onClick='link("ranking.html");'>Ranking</button>
            <button class="btnSobre btn" onClick='link("sobre.html");'>Sobre</button>
        </div>
    </div>
    <!--menu end-->
    
</body>
</html>
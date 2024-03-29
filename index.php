<?php
session_start();
session_destroy();
?>
<DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <title>Enigmas</title>
    <link rel="shortcut icon" type="image/x-icon" href="img/icon.png">
    <link rel="stylesheet" type="text/css" href="style/index.css">
    <script src="script/script.js"></script>
</head>
<body>
    
    <!-- alert -->
        <div id="alert" style="display:none">
                <div id="msg">Mensagem</div>
                <div id="x" onClick="x()">x</div>
        </div>
    <!-- alert end-->
    
    <!--menu-->
    <div id="selecao">
        <div class="form">
            <form name="form" action="validate.php" method="POST">
                <input type="text" class="input" name="nickname" placeholder="Digite um Nickname">
                <select id="nivel" class="input" style="margin:15px;" name="nivel" >
                    <option value="">Selecione o Nível</option>
                    <option value="muito facil">&#128512; Muito Fácil</option>
                    <option value="facil">&#128513; Fácil</option>
                    <option value="medio">&#128523; Médio</option>
                    <option value="dificil">&#128526; Difícil</option>
                    <option value="muito dificil">&#128545; Muito Difícil</option>
                </select>

                <div class='radiosBtn'>
                    <div id="radioPR" title="Essa opção é para perguntas e respotas" onclick="toogleRadio(0)">
                        <input type='radio' class="ocultar" name='tipo' value='PR'>
                        <label class='label'>Perguntas</label>
                    </div>
                    <div id="radioR" title="Essa opção é para roteiro"  onclick="toogleRadio(1)">
                        <input type='radio' class="ocultar" name='tipo' value='RT' disable>
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
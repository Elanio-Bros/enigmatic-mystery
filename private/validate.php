<?php
//private
include_once "class/question&journal_formate.php";
include_once "class/user.php";
include_once "SimulatedBD.php";
session_start();
//fazer a procura no banco de dados se caso o usuario 
//exista com o mesmo nome e ja tenha feita a mesma fase escolhida da erro
if ($_POST['tipo'] == 'PR') {
    $tipo = "perguntas";
    $numEnigma = numEngima($_POST['nivel'], $tipo);
    $question = new Questions($numEnigma['id']);
    $numPag = $question->getNumPags();
    $user = new User($_POST['tipo'], $_POST['nickname'], nivel($_POST['nivel']), $numEnigma['id'], $numPag);

    $_SESSION['user'] = $user;
    $_SESSION['game'] = $question;
} else if ($_POST['tipo'] == 'RT') {
    header("Location:./");
    $tipo = "roteiros";
    $numEnigma = numEngima('muito facil', $tipo);
    $journal = new Journal($numEnigma['id']);
    $user = new User($_POST['tipo'], $_POST['nickname'], nivel($_POST['nivel']), $numEnigma['id']);
    $_SESSION['user'] = $user;
    $_SESSION['game'] = $journal;
}

header("Location:game.php");

function numEngima($nivel, $tipo)
{
    try {
        $bd = new BancoDeDados($tipo);
        $bd->prepare($bd->SelectRandom());
        $bd->bindValue(0, $nivel);
        $bd->execute();
        $niveis = $bd->getStatement()->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo 'Erro:' . $e->getCode() . '<br/>' . 'Mensagem:' . $e->getMessage();
    }
    $qntdEnigmas = count($niveis) - 1;
    $rand = (rand(0, $qntdEnigmas));
    return $niveis[$rand];
}
function nivel($value)
{
    $value = strtolower($value);
    switch ($value) {
        case 'muito facil':
            return 1;
        case 'facil':
            return 2;
        case 'medio':
            return 3;
        case 'dificil':
            return 4;
        case 'muito dificil':
            return 5;
        default:
            return 'erro';
    }
}

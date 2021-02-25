<?php
//private
include_once "private/class/question&journal_formate.php";
include_once "private/class/user.php";

session_start();
$user = $_SESSION['user'];
$game = $_SESSION['game'];

if ($user->type == 'PR') {
    if (isset($_POST['dica']) && $_POST['dica'] == 'true') {
        echo dica($user, $game);
    } else if (isset($_POST['nsi']) && $_POST['nsi'] == 'nsi') {
        resposta($user, $game, 'nsi');
    } else if (isset($_POST['rsp']) || $_POST['rsp'] != '') {
        resposta($user, $game, strtolower($_POST['rsp']));
    }
}
if ($user->type == 'RT') {
    if (isset($_POST['dica']) && $_POST['dica'] == 'true') {
        echo dica($user, $game);
    } else if (isset($_POST['nsi']) && $_POST['nsi'] == 'nsi') {
        resposta($user, '', 'nsi');
    } else if (isset($_POST['rsp']) && $_POST['rsp'] != '') {
        resposta($user, $game, strtolower($_POST['rsp']));
    }
}

function dica($user, $game)
{
    $userDica = $user->getDica() + 1;
    if ($userDica <= $game->qtndDica($user->getFase())) {
        $dica = $userDica . "º)" . $game->getDica($user->getDica());
        $user->addDica();
        return $dica;
    }
}

function resposta($user, $game,$resposta)
{
    if ($user->type == 'PR') {
        if ($user->getFase() == $user->getFaseFinal()) {
            if ($game->getResposta() == $resposta) {
                $user->addPontos($game->pontosRespostas(), $user->getDica());
            }
            header("Location:final_point.php");
        } else if ($game->getResposta() == $resposta) {
            $user->addFase();
            $user->addPontos($game->pontosRespostas(), $user->getDica());
            header("Location:game.php");
        } else if ($resposta == 'nsi') {
            $user->addFase();
            header("Location:game.php");
        } else if ($game->getResposta() != $resposta) {
            header("Location:game.php?err=rsp");
        }
    } else if ($user->type = 'RT') {
        if ($resposta == 'nsi') {
            header("Location:final_point.php");
        } else if ($game->getResposta($resposta)){
            $user->addPontos($game->pontosRespostas(), $user->getDica());
            header("Location:final_point.php");
        } else if (!$game->getResposta($resposta)) {
            header("Location:game.php?err=rsp");
        }
    }
    $user->resetDica();
}

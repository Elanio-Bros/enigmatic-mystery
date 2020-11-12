<?php
//private
include_once "enigmas_query.php";
include_once 'user.php';
session_start();
$user = $_SESSION['user'];
$enigma = $_SESSION['enigma'];

if(isset($_POST['dica']) && $_POST['dica']=='true'){
    echo dica($user,$enigma);
}
if(isset($_POST['nsi'])&& $_POST['nsi']=='nsi'){
    resposta('','','nsi');
}
if(isset($_POST['rsp'])&& $_POST['rsp']!=''){
    resposta($user,$enigma,strtolower($_POST['rsp']));
}

function resposta($user,$enigma,$resposta){
    if($user->getFase() == $user->getFaseFinal()){
        //adicionar informações ao banco de dados
        header("Location:ranking.html");
    }
    else if($enigma->getResposta($user->getFase())==$resposta){
        $user->addFase();
        $user->addPontos(5,$user->getDica());
        header("Location:enigma.php");
    }
    else if($enigma->getResposta($user->getFase())!=$resposta){
        header("Location:enigma.php?err=rsp");
    }
    else if($resposta=='nsi'){
        $user->addFase();
        header("Location:enigma.php");
    }
    $user->resetDica();
}

function dica($user,$enigma){
    $user->addDica();
    if($user->getDica()<=$enigma->qtndDica($user->getFase())){
        return $user->getDica()."º)".$enigma->getDica($user->getFase(), $user->getDica());
    }
}
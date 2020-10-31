<?php
//private
include_once "enigmas_query.php";
include_once 'user.php';
session_start();
$user=$_SESSION['user'];
$enigma=$_SESSION['enigma'];
if(isset($_SESSION['user'])){
    if($_POST['rsp']==$enigma->getRespota($user->getFase())){
        $_SESSION['user']->addPontos(5);
    }
    if($_SESSION['user']->getFase() == $_SESSION['user']->getFaseFinal()){
        //salvar informações e ir para a pagina do rankig
        session_destroy();
        header("Location:ranking.html");
    }else{
        if($_POST['rsp']==$enigma->getRespota($user->getFase()) || $_POST['rsp']=='nsi'){
        header("Location:enigma.php");
        $_SESSION['user']->addFase();
        }else{
            header("Location:enigma.php?err=rsp");
        }
    }
}else{
    header('Location:.');
}
?>
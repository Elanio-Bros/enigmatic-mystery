<?php
include_once "functionsEnigimas.php";
include_once 'user.php';
session_start();
if(isset($_SESSION['user'])){
if($_POST['rsp']=='Ola'){
    //'ola' sera subustituido por a respota do banco de dados
    $_SESSION['user']->addPontos(5);
}
if($_SESSION['user']->__get('fase') == $_SESSION['user']->__get('faseFinal')){
    //salvar informações e ir para a pagina do rankig
    session_destroy();
    header("Location:ranking.php");
 }else{
    if($_POST['rsp']=='Ola' || $_POST['rsp']=='nsi'){
    header("Location:enigima.php");
    $_SESSION['user']->addFase();
    }else{
        header("Location:enigima.php?err=rsp");
    }
}
}else{
    header('Location:/PCC');
}
?>
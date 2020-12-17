<?php 
//private
include_once "class/questions_formate.php";
include_once "class/user.php";
session_start();
//fazer a procura no banco de dados se caso o usuario 
//exista com o mesmo nome e ja tenha feita a mesma fase escolhida da erro
if($_POST['tipo']=='PR'){

    $numAleatorio=numAle(NumEnigmas('facil')); 
    $enigmas= new Enigmas($numAleatorio);
    $numPag=$enigmas->getNumPags();
    $user=new User($_POST['tipo'],$_POST['nickname'],$_POST['nivel'],$numAleatorio,$numPag);
    $_SESSION['user']=$user;
    $_SESSION['enigma']=$enigmas;
    header("Location:questions.php");

}else if($_POST['tipo']=='RT'){

    $numAleatorio=numAle(NumEnigmas('facil'));
    $user=new User($_POST['tipo'],$_POST['nickname'],$_POST['nivel'],$numAleatorio);
    $_SESSION['user']=$user;
    header("Location:journal.php");
}

function numAle($numEnigmas){
    $rand=rand(1,$numEnigmas);
    return $rand;
}
function NumEnigmas($nivel,$tipo=null){
    //pegar do banco
    return 2;
}
?>
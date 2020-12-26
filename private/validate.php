<?php 
//private
include_once "class/question&journal_formate.php";
include_once "class/journal_formate.php";
include_once "class/user.php";
session_start();
//fazer a procura no banco de dados se caso o usuario 
//exista com o mesmo nome e ja tenha feita a mesma fase escolhida da erro
if($_POST['tipo']=='PR'){

    $numEnigma=numEngima('facil'); 
    $question= new Questions($numEnigma);
    $numPag=$question->getNumPags();
    $user=new User($_POST['tipo'],$_POST['nickname'],$_POST['nivel'],$numEnigma,$numPag);

    $_SESSION['user']=$user;
    $_SESSION['game']=$question;


}else if($_POST['tipo']=='RT'){

    $numEnigma=numEngima('facil');
    $user=new User($_POST['tipo'],$_POST['nickname'],$_POST['nivel'],$numEnigma);
    $journal= new Journal($numEnigma);

    $_SESSION['user']=$user;
    $_SESSION['game']=$journal;

    
}

header("Location:game.php");

function numEngima($nivel,$tipo=null){
    //pegar do banco
    $qntdEnigmas=1;
    //
    $rand=rand(1,$qntdEnigmas);
    return ($rand-1);
}
?>
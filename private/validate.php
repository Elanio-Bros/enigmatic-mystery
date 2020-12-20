<?php 
//private
include_once "class/questions_formate.php";
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
    $_SESSION['question']=$question;

    header("Location:questions.php");

}else if($_POST['tipo']=='RT'){

    $numEnigma=numEngima('facil');
    $user=new User($_POST['tipo'],$_POST['nickname'],$_POST['nivel'],$numEnigma);
    $journal= new Journal($numEnigma);

    $_SESSION['user']=$user;
    $_SESSION['journal']=$journal;

    header("Location:journal.php");
}

function numEngima($nivel,$tipo=null){
    //pegar do banco
    $qntdEnigmas=2;
    //
    $rand=rand(1,$qntdEnigmas);
    return $rand;
}
?>
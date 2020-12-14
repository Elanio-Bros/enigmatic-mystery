<?php 
//private
if($_POST['tipo']=='PR'){
    include_once "class/enigmas_query.php";
    include_once "class/user.php";
    session_start();
    //fazer a procura no banco de dados se caso o usuario 
    //exista com o mesmo nome e ja tenha feita a mesma fase escolhida da erro
    $numAleatorio=numAle(NumEnigmas('facil')); 
    $enigmas= new Enigmas($numAleatorio);
    $numPag=$enigmas->getNumPags();//numero aleatorio
    $user=new User($_POST['nickname'],$_POST['nivel'],$numAleatorio,$numPag);
    $_SESSION['user']=$user;
    $_SESSION['enigma']=$enigmas;
    header("Location:questions.php");
}else if($_POST['tipo']=='RT'){
    
}

function numAle($numEnigmas){
    $rand=rand(1,$numEnigmas);
    return $rand;
}
function NumEnigmas($nivel){
    //pegar do banco
    return 2;
}
?>
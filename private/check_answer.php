<?php
//private
include_once "private/class/questions&journal_formate.php";
include_once "private/class/user.php";

session_start();
$user = $_SESSION['user'];

if($user->type=='PR'){
    $enigma = $_SESSION['enigma'];

    if(isset($_POST['dica']) && $_POST['dica']=='true'){
        echo dica($user,$enigma);
    }
    if(isset($_POST['nsi'])&& $_POST['nsi']=='nsi'){
        resposta($user,$enigma,'nsi');
    }
    if(isset($_POST['rsp'])&& $_POST['rsp']!=''){
        resposta($user,$enigma,strtolower($_POST['rsp']));
    }
}
if($user->type=='RT'){
    if(isset($_POST['dica']) && $_POST['dica']=='true'){
        echo dica($user,null,"Ola");
    }
    if(isset($_POST['nsi'])&& $_POST['nsi']=='nsi'){
        resposta($user,'','nsi');
    }
    // if(isset($_POST['rsp'])&& $_POST['rsp']!=''){
    //     resposta($user,$enigma,strtolower($_POST['rsp']));
    // }

    
}

function dica($user,$question=null,$journal=null){
    if($user->type=='PR'){
        $user->addDica();
        if($user->getDica()<=$question->qtndDica($user->getFase())){
            return $user->getDica()."º)".$question->getDica($user->getFase(), $user->getDica());
        }
    }
    if($user->type=='RT'){
        $user->addDica();
        if($user->getDica()<=$journal->qtndDica($user->getFase())){
            return $user->getDica()."º)".$journal->getDica($user->getFase(), $user->getDica());
        }
    }
}

 function resposta($user,$enigma,$resposta){
     if($user->type=='PR'){
        if($user->getFase() == $user->getFaseFinal()){
            //adicionar informações ao banco de dados
            header("Location:ranking.html");
        }
        else if($resposta=='nsi'){
            $user->addFase();
            header("Location:game.php");
        }
        else if($enigma->getResposta($user->getFase())==$resposta){
            $user->addFase();
            $user->addPontos(5,$user->getDica());
            header("Location:game.php");
        }
        else if($enigma->getResposta($user->getFase())!=$resposta){
            header("Location:game.php?err=rsp");
        }
     }else if($user->type='RT'){

        if($resposta=='nsi'){
            header("Location:ranking.html");
        }
        else if($enigma->getResposta($user->getFase())==$resposta){
            //subistituir o 5 por uma quantidade variavel de acordo com a respota
            $user->addPontos(5,$user->getDica());
            header("Location:ranking.html");
        }
        else if($enigma->getResposta($user->getFase())!=$resposta){
            header("Location:game.php?err=rsp");
        }
     }
    
    
    $user->resetDica();
}  
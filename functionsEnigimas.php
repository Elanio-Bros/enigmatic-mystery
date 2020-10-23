<?php
include 'teste.php';
include 'user.php';
session_start();
function numAleatorio(){
    //ele vai pegar a quantida de paginas no banco de dados
    $rand=rand(1,4);
    return $rand;
}
function qtndPaginas($num){
    //ele vai pegar a quantida de paginas no banco de dados
    $quantidade=fase($num); 
    return $quantidade-1;
}
function arguments($numfase){
    $num=$_SESSION['user']->__get('num');
    $Bd=BD($num);
    $numfase=$numfase;
    $title =explode(',',$Bd[0]);
    $media =explode(';',$Bd[1]);
    $text =explode(',',$Bd[2]);
    return $juntos=['title'=>$title[$numfase],'media'=>$media[$numfase],'text'=>$text[$numfase]];;
}
function links(){
    $link=[
        'foto'=>'https://images-wixmp-ed30a86b8c4ca887773594c2.wixmp.com/i/1bcfd914-5496-4c73-9288-0e19831cb9a3/d1cmpz8-cb7cea1d-e4a8-4768-8498-5c84cdb600f1.png',
        'video'=>'http://v2v.cc/~j/theora_testsuite/320x240.ogg',
        'audio'=>'media/teste.mp3'];
        return $link;
}
echo numAleatorio();
?>

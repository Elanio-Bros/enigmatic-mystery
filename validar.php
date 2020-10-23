<?php 
include_once "functionsEnigimas.php";
include_once 'user.php';
session_start();
//fazer a procura no banco de dados e caso o usuario 
//exista com o mesmo nome e ja tenha feita a mesma fase escolhida
$num=numAleatorio();
$user=new User($_POST['nickname'],$_POST['nivel'],$num,qtndPaginas($num));
$_SESSION['user']=$user;
header("Location:enigima.php");
?>
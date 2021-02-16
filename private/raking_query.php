<?php
    //private
    include_once "SimulatedBD.php";
    $bd=new BancoDeDados('raking');
    $bd->prepare($bd->SelectRaking());
    $bd->execute();
    $raking=$bd->getStatement()->fetchAll(PDO::FETCH_ASSOC);
   echo json_encode($raking);
  // SELECT * FROM `raking` ORDER BY pontos DESC para pegar os valores do maior para o menor
  // SELECT * FROM `raking` WHERE nivelFeito=<Numero do nivel> ORDER BY pontos DESC para pegar os valores do maior para o menor
?>
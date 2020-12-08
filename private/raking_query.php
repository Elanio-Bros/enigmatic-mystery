<?php
    //private
    $raking=array(
        ['nickname'=>'Massa','nivel'=>1,'fase'=>6,'pontos'=>1500],
        ['nickname'=>'Bros55555','nivel'=>2,'fase'=>0,'pontos'=>75],
        ['nickname'=>'Uhpapaichegou','nivel'=>3,'fase'=>7,'pontos'=>140],
        ['nickname'=>'EusouRico','nivel'=>4,'fase'=>0,'pontos'=>255],
        ['nickname'=>'Fenix','nivel'=>5,'fase'=>10,'pontos'=>75],
        ['nickname'=>'1234567891011121314151617181920212232122','nivel'=>1,'fase'=>0,'pontos'=>75]
    );
   echo json_encode($raking);
  // SELECT * FROM `raking` ORDER BY pontos DESC para pegar os valores do maior para o menor
  // SELECT * FROM `raking` WHERE nivelFeito=<Numero do nivel> ORDER BY pontos DESC para pegar os valores do maior para o menor
?>
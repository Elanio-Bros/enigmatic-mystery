<?php
function BD($num){
    $BD=array(
        ['Ola,Massa,Demais','f,a;a;f,v;','Muito Massa,Demais,Sencacional'],
        ['Que isso,Jabuticaba,Demais','a;f;f,v;','Demais,Azedinha,é Isso'],
        ['Torneio,Advogado,Labirinto','f,v;f,a;v;','Competição esportiva,Um advogado é um profissional liberal,Um labirinto é constituído '],
        ['Burger,Casca,Labirinto','f,v;a;v;','Comida,Tecidos de revestimento do tronco,Lugar'],
        ['Escotilha,Disco,Corso','f;a;v;','Buraco,Unidade,Tipo de guerra irregular']
    );
    return $BD[$num]; //mudar para pegar a quantidade no banco de dados
}
function fase($num){
    $bd=BD($num);
    return count(explode(',',$bd[0]));
}
?>
<?php
    include_once 'private/SimulatedBD.php';

  class Journal
  {
      public $enigma;
  
      public function __construct($numRandom)
      {
          //requeições ao banco de dados
          //teste journal
          $this->enigma = BD(0);
      }
  
      public function getTitle()
      {
          $title = $this->enigma['titles'][0];
          return $title;
      }
      public function getText()
      {
          $title = $this->enigma['text'][0];
          return $title;
      }
      public function structure()
    {
       // separa entre letras e numeros
        $strutures=explode(",",$this->enigma['strutures'][0]);
        return $this->montandoEstrura(1,"Ola");
    }

    private function montandoEstrura($valor,$conteudo){
       switch($valor){
            case 1:
                return "<div class='conteudo row'>
                <img class='img' src='https://img.freepik.com/vetores-gratis/imagens-animadas-abstratas-neon-lines_23-2148344065.jpg?size=626&ext=jpg'>
                <p>Ola</p></div>";
                break;
            case 2:
                return "<div class='conteudo row'>
                <p>Ola</p>
                <img class='img' src='https://img.freepik.com/vetores-gratis/imagens-animadas-abstratas-neon-lines_23-2148344065.jpg?size=626&ext=jpg'>
                </div>";
                break;
            case 3:
                return "<div class='conteudo2 column'>
                <img src=''>
                <p></p></div>";
                break;
            case 4:
                return "<div class='conteudo2 column'><p></p></div>";
            break;

            default:
            return "<div class='conteudo4'>$conteudo</div>";


       }
    }

    private function media($media,$src){
        switch($media){
             case 'i':
                 return "<img class='img' src=''>";
                 break;
             case 'v':
                 return "<video controls src='' type='video/mp4'/>";
                 break;
             case 'a':
                 return  "<img class='img' src=''>";
                 break;
        }
     }
}
?>
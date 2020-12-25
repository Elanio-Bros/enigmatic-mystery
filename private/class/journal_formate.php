<?php
    include_once 'private/SimulatedBD.php';

  class Journal
  {
      public $enigma;
      public $title;
  
      public function __construct($numRandom)
      {
          //requeições ao banco de dados
          //teste journal
          $this->enigma = BD(0);
          $this->title = $this->enigma['titles'][0];
      }
      public function get($tipo,$num)
      {
          $acessoBD = $this->enigma[$tipo][$num];
          return $acessoBD;
      }

      public function structure()
    {
       // separa entre letras e numeros
        $strutures=$this->enigma['strutures'];
        $juntos=null;
        foreach($strutures as $key => $value){
            if($value==0){
                $juntos=$this->montandoEstrura($juntos,);
            }else{
                $juntos=$juntos.''.$this->montandoEstrura($this->get('texts',$key),$value,$this->get('media',$key),$this->get('links',$key));
            }
            
        }
        return $juntos;
    }

    private function montandoEstrura($conteudo,$valor=0,$media=null,$link=null){
        if($media!=null){
            $media=$this->media($media,$link);
        }
       switch($valor){
            case 1:return "<div class='conteudo row'><p>$conteudo</p>$media</div>";

            case 2:return "<div class='conteudo row'>$media<p>$conteudo</p></div>";

            case 3:return "<div class='conteudo2 column'>$media<p>$conteudo</p></div>";

            default:return "<div class='conteudo4'>$conteudo</div>";


       }
    }

    private function media($media,$link){
        switch($media){
             case 'i':return "<img class='img' src='$link'>";
             case 'v':return "<video src='$link' preload='auto' controls controlslist='nodownload'/>";
             case 'a':return  "<audio src='$link' preload='auto' controls controlslist='nodownload'/>";
        }
     }
}
?>
<?php
include_once 'private/SimulatedBD.php';

const MIDIA="medias";
const TEXT="texts";
const LINK='links';

//private
class Questions
{
    
    public $enigma;
    public $title;
    public $numFase;

    public function __construct($numRandom)
    {
        //requeições ao banco de dados
        //teste questions
        $this->enigma = BD($numRandom);
        
    }

    public function numFase($fase){
        $this->numFase=($fase-1);
        $this->title = $this->enigma['titles'][$this->numFase];
    }

    private function get($type){
        $type = $this->enigma[$type][$this->numFase];
        return $type;
    }

    public function getDica($numPagina,$numDica)
    {
        $dicas = $this->enigma['dicas'][--$numPagina][--$numDica];
        return $dicas;
    }
    public function qtndDica($numPagina)
    {
        $count = count($this->enigma['dicas'][--$numPagina]);
        return $count;
    }

    
    public function getResposta($numPagina)
    {
        $resposta = $this->enigma['respostas'][--$numPagina];
        return $resposta;
    }
    public function structure()
    {
        $letras = $this->get(MIDIA);
        $link = $this->get(LINK);
        $text = $this->get(TEXT);
        $tipo = ['f', 'v', 'a', 't'];
        $nome = ['foto', 'video', 'audio', 'text'];
        $medias = array();
        for ($i = 0; $i < 4; $i++) {
            $numStructure = strpos($letras, $tipo[$i]);
            if ($numStructure === 0 || $numStructure>=1) {
                if ($tipo[$i] != 't') {
                    $medias[$numStructure] = $this->structuringMedia($nome[$i], $link[$nome[$i]]);
                } else {
                    $medias[$numStructure] = "<div class='text'>$text</div>";
                }
            }
        }
        ksort($medias); //
        return implode('', $medias);
    }
    private function structuringMedia($name, $link)
    {
        $structure = '';
        switch ($name) {
            case 'foto':
                $structure = "<div class='midia'><img src='$link'></div><br/>";
                break;
            case 'video':
                $structure = "<div class='midia'><video src='$link' preload='auto' controls controlslist='nodownload'/></div><br/>";
                break;
            case 'audio':
                $structure = "<div class='midia'><audio src=$link preload='auto' controls controlslist='nodownload'/></div>";
                break;
        }
        return $structure;
    }

    public function getNumPags()
    {
        return count($this->enigma['titles']);
    }
}

class Journal
{
    public $enigma;
    public $title;

    public function __construct($numRandom)
    {
        //requeições ao banco de dados
        //teste journal
        $this->enigma = BD2($numRandom);
        $this->title = $this->enigma['titles'][0];
    }
    public function get($tipo,$num)
    {
        $acessoBD = $this->enigma[$tipo][$num];
        return $acessoBD;
    }
    public function getDica($numPagina,$numDica)
    {
        $dicas = $this->enigma['dicas'][--$numPagina][--$numDica];
        return $dicas;
    }
    public function qtndDica($numPagina)
    {
        $count = count($this->enigma['dicas'][--$numPagina]);
        return $count;
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
              $juntos=$juntos.''.$this->montandoEstrura($this->get(TEXT,$key),$value,$this->get(MIDIA,$key),$this->get(LINK,$key));
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

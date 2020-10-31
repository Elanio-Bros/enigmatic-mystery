<?php
include_once 'SimulatedBD.php';

//private
class Enigmas
{
    public $enigma;

    public function __construct($numRandom)
    {
        //requeições ao banco de dados
        //teste
        $this->enigma = BD(--$numRandom);
    }

    public function getTitle($num)
    {
        $title = $this->enigma['titles'][--$num];
        return $title;
    }

    private function getMedia($num)
    {
        $media = $this->enigma['medias'][--$num];
        return $media;
    }

    private function getText($num)
    {
        $text = $this->enigma['texts'][--$num];
        return $text;
    }

    private function getLink($num)
    {
        $link = $this->enigma['links'][--$num];
        return $link;
    }
    public function getRespota($num)
    {
        $resposta = $this->enigma['respostas'][--$num];
        return $resposta;
    }
    public function structures($num)
    {
        $letras = $this->getMedia($num);
        $link = $this->getLink($num);
        $text = $this->getText($num);
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
                $structure = "<div><img class='img' src='$link'></div><br/>";
                break;
            case 'video':
                $structure = "<div><video class ='img' src='$link' preload='auto' controls controlslist='nodownload'></video></div><br/>";
                break;
            case 'audio':
                $structure = "<div><audio class ='audio' src=$link preload='auto' controls controlslist='nodownload'></audio></div>";
                break;
        }
        return $structure;
    }

    public function getNumPags()
    {
        //pegar do banco
        return 3;
    }
}
//pensar melhor echo 

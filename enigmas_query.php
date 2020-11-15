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

    public function getTitle($numPagina)
    {
        $title = $this->enigma['titles'][--$numPagina];
        return $title;
    }

    private function getMedia($numPagina)
    {
        $media = $this->enigma['medias'][--$numPagina];
        return $media;
    }

    private function getText($numPagina)
    {
        $text = $this->enigma['texts'][--$numPagina];
        return $text;
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

    private function getLink($numPagina)
    {
        $link = $this->enigma['links'][--$numPagina];
        return $link;
    }
    public function getResposta($numPagina)
    {
        $resposta = $this->enigma['respostas'][--$numPagina];
        return $resposta;
    }
    public function structures($numPagina)
    {
        $letras = $this->getMedia($numPagina);
        $link = $this->getLink($numPagina);
        $text = $this->getText($numPagina);
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
        
        return count($this->enigma['titles']);
    }
}

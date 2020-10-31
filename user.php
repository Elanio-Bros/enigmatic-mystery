<?php
//private
class User{
    public $nickName;
    public $nivel;
    public $num;
    public $faseFinal;
    public $pontos=0;
    public $fase=1;

    public function __construct($nickName,$nivel,$num,$faseFinal){
        $this->nickName=$nickName;
        $this->nivel=$nivel;
        $this->num=$num;
        $this->faseFinal=$faseFinal;
    }
    public function addPontos($qntd){
        $this->pontos=$this->pontos+$qntd;
    }
    public function getPontos($qntd){
        return $this->pontos;
    }
    public function addFase(){
        $this->fase++;
    }
    public function getFase(){
        return $this->fase;
    }
    public function getFaseFinal(){
        return $this->faseFinal;
    }

}
?>
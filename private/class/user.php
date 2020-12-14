<?php
//private
class User{
    public $nickName;
    public $nivel;
    public $num;
    public $faseFinal;
    public $pontos=0;
    public $fase=1;
    public $dica=0;

    public function __construct($nickName,$nivel,$num,$faseFinal=null){
        $this->nickName=$nickName;
        $this->nivel=$nivel;
        $this->num=$num;
        $this->faseFinal=$faseFinal;
    }

    public function addPontos($qntdPontos,$qntdDicas){
        $this->pontos=$this->pontos+($qntdPontos-$qntdDicas);
    }
    public function getPontos(){
        return $this->pontos;
    }
    public function addFase(){
        $this->fase++;
    }
    public function getFase(){
        return $this->fase;
    }
    public function getDica(){
        return $this->dica;
    }
    public function addDica(){
        $this->dica++;
    }
    public function resetDica(){
        $this->dica=0;
    }
    
    public function getFaseFinal(){
        if($this->faseFinal!= null){
            return $this->faseFinal ;
        }
    }

}
?>
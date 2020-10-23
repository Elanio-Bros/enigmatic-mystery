<?php 
class User{
    public $nickName;
    public $nivel;
    public $num;
    public $faseFinal;
    public $pontos=0;
    public $fase=0;

    public function __construct($nickName,$nivel,$num,$faseFinal){
        $this->nickName=$nickName;
        $this->nivel=$nivel;
        $this->num=$num;
        $this->faseFinal=$faseFinal;
    }
    public function addPontos($qntd){
        $this->pontos=$this->pontos+$qntd;
    }
    public function addFase(){
        $this->fase++;
    }
    public function __get($attr){
        return $this->$attr;
    }
    public function __set($attr,$value){
        $this->$attr=$value;
    }

}
?>
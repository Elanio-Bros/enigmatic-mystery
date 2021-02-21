<?php
//private
class User
{
    private $nickName;
    private $nivel;
    private $num;
    private $faseFinal;
    private $pontos = 0;
    private $fase = 1;
    private $dica = 0;
    public $type = '';

    public function __construct($type, $nickName, $nivel, $num, $faseFinal = null)
    {
        $this->nickName = $nickName;
        $this->nivel = $nivel;
        $this->num = $num;
        $this->faseFinal = $faseFinal;
        $this->type = $type;
    }
    public function addPontos($qntdPontos, $qntdDicas)
    {
        $pontos=$this->pontos + ($qntdPontos - ($qntdDicas*5));
        if($pontos>=0){
            if ($this->type == 'PR') {
                $this->pontos = $pontos;
            } else if($this->type == 'RT'){
                $this->pontos = $pontos;
            }
        }
    }
    public function getAllDados(){
        return [$this->nickName,$this->nivel,$this->type,$this->fase,$this->pontos];
    }
    public function getPontos()
    {
        return $this->pontos;
    }
    public function addFase()
    {
        $this->fase++;
    }
    public function getFase()
    {
        return $this->fase;
    }
    public function getDica()
    {
        return $this->dica;
    }
    public function addDica()
    {
        $this->dica++;
    }
    public function resetDica()
    {
        $this->dica = 0;
    }
    public function getFaseFinal()
    {
        return $this->faseFinal;
    }
}

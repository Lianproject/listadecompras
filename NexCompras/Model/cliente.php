<?php 

class Cliente{
    private $disponivel;

    public function setDisponivel($disponivel){
        $this->disponivel = $disponivel;
    }

    public function getDisponivel(){
        return $this->disponivel;
    }
}
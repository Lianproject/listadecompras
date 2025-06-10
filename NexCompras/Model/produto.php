<?php 

class Produto{
    private $id;
    private $produto;
    private $preco;
    private $qtd;
    

    
    public function setId($id) {

        $this->id = $id;
    }

    public function getId(){
        return $this->id;
    }

    public function setProduto($produto){
        $this->produto = $produto;
    }

    public function getProduto(){
        return $this->produto;
    }

    public function setPreco($preco){
        $this->preco = $preco;
    }

    public function getPreco(){
        return $this->preco;
    }

    public function setQtd($qtd){
        $this->qtd = $qtd;
    }

    public function getQtd(){
        return $this->qtd;
    }
}
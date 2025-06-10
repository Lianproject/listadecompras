<?php 
require_once '../Model/produto.php';

session_start();

if(!isset($_SESSION['valorDisponivel'])){
    header('Location: ../view/valor.php');
}else{
    
    if(!isset($_SESSION['itens'])){
        $_SESSION['itens'] = [];
    }
    
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $produto = new Produto();
        $produto->setProduto(($_POST['produto']));
        $produto->setPreco($_POST['valor']);
        $produto->setQtd($_POST['qtd']);

        $_SESSION['itens'][] = $produto;
        header('location: ../view/index.php');
        
    }
}

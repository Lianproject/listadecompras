<?php 
require_once '../Model/produto.php';

session_start();


if(!isset($_SESSION['valorDisponivel'])){
    header('Location: ../view/valor.php');
}

if($_GET['id'] != null){
    
    $id = $_GET['id'];
    array_splice($_SESSION['itens'], $id, 1);
    header('Location: ../view/index.php');  
    exit;
}
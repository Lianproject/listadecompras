<?php 
require_once '../Model/cliente.php';

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $cliente = new Cliente();
    $cliente->setDisponivel($_POST['txtValor']);
    
    session_start();
    $_SESSION['valorDisponivel'] = $cliente->getDisponivel();
    header('Location: ../view/index.php');
}
?>
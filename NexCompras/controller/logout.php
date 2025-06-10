<?php 

session_start();
if(isset($_SESSION['valorDisponivel'])){
    unset($_SESSION['valorDisponivel']);
    session_destroy();
    header('Location: ../view/valor.php');
}
<?php
require_once '../Model/produto.php';
session_start();
if(!isset($_SESSION['valorDisponivel'])){
  header('Location: valor.php');
  
}

$qtd = null;

if(!empty($_SESSION['itens'])){
    $qtd = count($_SESSION['itens']);
}

$total = 0;
if(empty($_SESSION['itens'])){
        $_SESSION['itens'] = [];
      }else{
        foreach($_SESSION['itens'] as $valores){
              $total += $valores->getPreco() * $valores->getQtd();
          }
      }


?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0 user-scalable=no">
    <title>NexCompras</title>
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" href="../imagem/icon.ico" type="image/x-icon">
</head>
<body>
  <div class="conteudo-celular">
    <header>
        <div class="logotxt">
           <img src="../imagem/icon.ico" alt="">
            <h3>Listas de Compras</h3>
        </div>
                <div class="compras"> 
                   <input class="totaltxt" type="number" disabled placeholder="<?php echo "R$ ".number_format($total,2,",","."); ?>">
                    <p class="txtTotal"><?php echo ($qtd == 0) ? 0 : $qtd; ?></p> 
                    <img class="carrinhoimg" src="../imagem/carrinho.png" alt="carrinho">
               </div>
               
    </header>


<main>
    <div class="for">
        <form action="../controller/addProduto.php" method="post"> 
           <div class="formresp">

            <input name="produto" class="txt" placeholder="Nome do Produto" type="text">
            <input name="valor" class="vl txt" placeholder="Valor"  type="number" step="any">
            <input name="qtd" class="qtdtxt txt" placeholder="Qtd" type="number">
 
            <!-- Botao ADD+ -->
             <button class="btn" >ADD+</button>
           </div>

        </form>
    </div>
    <div class="Tabela">
<table>
    <caption>
        <?php echo "Valor para compras: R$ ". number_format($_SESSION['valorDisponivel'],2,",",".")."<br>";?>
        <?php echo "Valor disponivel: R$ ". number_format($_SESSION['valorDisponivel'] - $total,2,",","."); ?>
    </caption>
    <thead>
      <tr>        
        <th>produto</th>
        <th>Preço</th>
        <th>qtd</th>
        <th>Total</th>
        <th>açoes</th>
      </tr  >
    </thead>
    <tbody>
      <?php
      if(empty($_SESSION['itens'])){
        $_SESSION['itens'] = [];
      }
        foreach($_SESSION['itens'] as $key => $dados):         
      ?>
      <tr>       
        <td><?php echo $dados->getProduto();?></td>
        <td><?php echo "R$ ".number_format($dados->getPreco(),2,",","."); ?></td>
        <td><?php echo $dados->getQtd(); ?></td>
        <td><?php echo "R$ ".number_format($dados->getPreco() * $dados->getQtd(),2,",","."); ?></td>
       <td><a class="Delete" href="../controller/delete.php?id=<?php echo $key?>">Delete</a></td>
      </tr>
      <?php endforeach; ?>
      
    </tbody>
  </table>
    </div>
     
    
   
    
</main>

  </div>

   <div class="mensagem-desktop">
    <p>Este site é compatível apenas com dispositivos móveis.</p>
    </div>       


</body>
</html>
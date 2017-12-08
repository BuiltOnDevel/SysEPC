<?php
session_start();

// Classes para inicialização, controle de acesso, configuração e conexão do banco
require_once 'config.php';
require 'src/acess.php';
require_once("bd/conexao.php");
    // validando a conexão do banco
   if(!$pdo = Database::conexao()) {echo "Sem conexão com o banco de dados!"; }
?>

<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <title>Sistema YZX</title>
    <meta charset="utf-8">
  </head>
  <body>
    <a href="criar.php">Adicionar nova Task</a>
    <form action="" method="post">
  <table border="1" width="100%">
    <tr>
        <th>Código</th>
        <th>Nome</th>
        <th>Descrição</th>
        <th>Arquivo</th>
        <th>Ação</th>
    </tr>
    <?php
         if($stmt = $pdo->prepare("SELECT codigo, nome, descricao, arquivo FROM tasks" ))
         $stmt->execute();
       
        while ($linha = $stmt->fetch(PDO::FETCH_ASSOC)){ ?>

            <tr>
            <td> <?php echo $linha['codigo']; ?></td> 
            <td> <?php echo $linha['nome']; ?></td> 
            <td> <?php echo $linha['descricao']; ?></a></td> 
            <td> <a href="uploads/<?php echo $linha['arquivo']; ?>" target="_blank"> Abrir </a></td> 

            <td><a href='editar.php?codigo=<?php echo $linha['codigo']; ?>'>Editar</a>
                <a href='deletar.php?codigo=<?php echo $linha['codigo']; ?>'>Excluir</a> </td>
            </tr>
        <?php } ?>
</table>
     
    </form>
    <a href="src/logout.php">Logout</a>
    <a href="painel.php">Painel</a>
  </body>
</html>
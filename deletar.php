<?php
  session_start();
 
  // Classes para inicialização, controle de acesso, configuração e conexão do banco
  require_once 'config.php';
  require 'src/acess.php';
  require_once("bd/conexao.php");
  
    // validando a conexão do banco
   if(!$pdo = Database::conexao()) {echo "Sem conexão com o banco de dados!"; }
   // convertendo o codigo em INT.
   $usuario_codigo = intval($_GET['codigo']);
  // validando que o codigo não seja nulo!
  if($usuario_codigo==''){echo "Codigo inválido!"; exit;}
  // Statement para deletação do dado!
  $stmt = $pdo->prepare("DELETE FROM tasks WHERE codigo = $usuario_codigo");
  $stmt->bindParam(':codigo', $usuario_codigo, PDO::PARAM_INT);
  
  if($stmt->execute()){
    echo "Registro deletado com sucesso!";
  }


   

?>
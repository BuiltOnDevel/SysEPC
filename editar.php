<?php
  session_start();
  
  // Classes para inicialização, controle de acesso, configuração e conexão do banco
  require_once 'config.php';
  require 'src/acess.php';
  require_once("bd/conexao.php");
   // validando a conexão do banco
   if(!$pdo = Database::conexao()) {echo "Sem conexão com o banco de dados!"; }
   // Convertendo o codigo em INT
   $usuario_codigo = intval($_GET['codigo']);
  // Validando para que o codigo não seja nulo
  if($usuario_codigo==''){echo "Codigo inválido!"; exit;}
  // Statement para seleção do dado!
  $stmt = $pdo->prepare("SELECT codigo, nome, descricao, arquivo FROM tasks ");
  $stmt->bindParam(':codigo', $usuario_codigo, PDO::PARAM_INT);
  $stmt->execute();
  
  $dados = $stmt->fetch(PDO::FETCH_ASSOC);

?>
<html lang="pt-br">
  <head>
    <title>Sistema YZX</title>
    <meta charset="utf-8">
  </head>
  <body>
    <form action="src/edit.php" method="post" enctype="multipart/form-data">
        <div>
        <label for="nome1">Nome</label> 
        <input type="text" id="nome1" name="nome" value="<?php echo $dados['nome']; ?>" />
      </div>
        <div>
            <label for="desc">Descrição</label>
            <input type="text" id="desc" name="desc" value="<?php echo $dados['descricao']; ?>" />
        </div>

        <div>
            <label for="arquivo">Arquivo</label>
            <a name="mostra_arquivo"href="uploads/<?php echo $dados['arquivo']; ?>" target="_blank"><?php echo $dados['arquivo']; ?></a>
            <input type="file" name="arquivo" value="<?php echo $dados['arquivo']; ?>" />
            
        </div>
            <input type="submit" name="enviar" value="Enviar"/>
            <input type="hidden" name="codigo" value="<?php echo $dados['codigo']; ?>" />
    </form>
    <a href="src/logout.php">Logout</a>
    <a href="painel.php">Painel</a>
  </body>
</html>
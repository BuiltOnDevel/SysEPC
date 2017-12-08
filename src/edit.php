<?php
  require("../config.php");
  require_once("../bd/conexao.php");
  session_start();
 
// verificando se algum campo está vazio!
 if(empty($_POST['nome']) || empty($_POST['desc']))
    echo "Campos vazios";


  // Verificando se o arquivo não tenha mais de 8MB!
  if($_FILES['arquivo']['size'] > 8387608) {echo "Arquivo muito grande!"; exit;}
   
  // Validando que a um arquivo!  
  if(!empty($_FILES['arquivo'])){

    $nomeArq = ($_FILES['arquivo']);
    $ext = strtolower(substr($_FILES['arquivo']['name'],-4)); // pega o tipo da exensão do arquivo
    $rename = md5(time()).$ext; // pego a data atual + hash MD5 junto com a extensão.
    $dir = ROOT."/uploads/"; // diretorio raiz

    move_uploaded_file($_FILES['arquivo']['tmp_name'], $dir.$rename); // move o arquivo e renomeio para o novo nome do arquivo
    
    // Guarda nome antigo da foto, para não perca a referência!
    $mostra_arquivo = $POST['mostra_arquivo'];
    $codigo = $_POST['codigo'];
    $nome = $_POST['nome'];
    $desc = $_POST['desc'];
    //Atualizando os dados no banco.
    $pdo = Database::conexao();
    $stmt = $pdo->prepare("UPDATE tasks SET nome = '$nome', descricao = '$desc', arquivo = '$rename' WHERE codigo = '$codigo'");
    $stmt->bindParam(1, $nome);
    $stmt->bindParam(2, $desc);
    $stmt->bindParam(3, $rename);

    // Validação, caso ocorra um erro no statement.
    if(!$stmt->execute())
      $msg = "Falha ao enviar o arquivo ".$nomeArq;
    else
      $msg = "Registro editado com sucesso!"; 
  }
  else
    echo "Campo de arquivo vazio";

  if($msg != false) echo "<p> $msg </p>";

?>
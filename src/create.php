<?php
  require("../config.php");
  require_once("../bd/conexao.php");

  // Salvando os dados em uma SESSION e verificando se existe uma SESSION
  if(!isset($_SESSION))
    session_start();
  
  // verificando se algum campo está vazio!
  if(empty($_POST['nome']) || empty($_POST['desc'])){echo "Campos vazios";exit;}

  
  // Verificando se o arquivo não tenha mais de 8MB!
  if($_FILES['arquivo']['size'] > 8387608) {echo "Arquivo muito grande!"; exit;}
   
  // Validando que a um arquivo!  
  if(!empty($_FILES['arquivo'])){

    $nomeArq = ($_FILES['arquivo']);
    $ext = strtolower(substr($_FILES['arquivo']['name'],-4)); // pega o tipo da exensão do arrquivo
    $rename = md5(time()).$ext; // pego a data atual + hash MD5 junto com a extensão.
    $dir = ROOT."/uploads/"; // diretorio raiz

    move_uploaded_file($_FILES['arquivo']['tmp_name'], $dir.$rename); // move o arquivo e renomeio para o novo nome do arquivo
    
    
    //Inserindo dados no banco.
    $pdo = Database::conexao();
    $stmt = $pdo->prepare("INSERT INTO tasks (nome, descricao, arquivo) VALUES (?, ?, ?)");
    $stmt->bindParam(1, $_POST['nome']);
    $stmt->bindParam(2, $_POST['desc']);
    $stmt->bindParam(3, $rename);

    // Validação, caso ocorra um erro no statement.
    if(!$stmt->execute())
      $msg = "Falha ao enviar o arquivo ".$nomeArq;
    else
      $msg = "Arquivo enviado com sucesso!"; 
  }
  else
    echo "Campo de arquivo vazio";

  if($msg != false) echo "<p> $msg </p>";

?>
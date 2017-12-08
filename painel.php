<?php
session_start();
//classes para inicialização, controle de acesso, configuração e conexão do banco!
require_once 'config.php';
require 'src/acess.php';
?>

<html lang="pt-br">
  <head>
    <title>Sistema YZX</title>
    <meta charset="utf-8">
  </head>
  <body>
  	<div>
  		<h3>Bem-Vindo ao sistema EPC!</h3>
  	</div>
  	<div>
  		<a href="criar.php">Cria uma nova Task!</a>
  	</div>
  	<div>
  		<a href="listar.php">Lista Task</a>
  	</div>
        <a href="src/logout.php">Logout</a>
    </form>
  </body>
</html>
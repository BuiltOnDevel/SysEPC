<?php

session_start();
// Classes para inicialização, controle de acesso, configuração e conexão do banco
require_once 'config.php';
require 'src/acess.php';
?>


<html lang="pt-br">
  <head>
    <title>Sistema YZX</title>
    <meta charset="utf-8">
  </head>
  <body>
    <form action="src/create.php" method="post" enctype="multipart/form-data">
        <div>
        <label for="nome1">Nome</label>
        <input type="text" id="nome1" name="nome" />
      </div>
        <div>
            <label for="desc">Descrição</label>
            <input type="text" id="desc" name="desc" />
        </div>

        <div>
            <label for="arquivo">Arquivo</label>
            <input type="file" required name="arquivo"  />
           
        </div>
            <input type="submit" name="enviar" value="Enviar"/>
    </form>
    <a href="src/logout.php">Logout</a>
    <a href="painel.php">Painel</a>
  </body>
</html>
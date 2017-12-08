<?php
    // Classes para inicialização, controle de acesso, configuração e conexão do banco
    require("../config.php");
    require_once("../bd/conexao.php");

    // Validando o post, caso tenha uma exceção
    if(empty($_POST['enviar'])){ echo "Algum está errado!";  exit;}
    // validando a conexão do banco
    if(!$pdo = Database::conexao()) {echo "Sem conexão com o banco de dados!"; }
        // Validando post email e usuario
        if(!empty($_POST['email_usuario']) || empty($_POST['senha_usuario'])){
    	 	$email = $_POST['email_usuario'];
            // Criptografando a senha em  Hash sha1
            $pc = sha1($_POST['senha_usuario']);
                // Statement para seleção de dados!
               if($stmt = $pdo->prepare("SELECT email, senha FROM usuario WHERE email = :email AND senha = :pc" )){
               		
                     $stmt->bindParam(':email', $email);
                     $stmt->bindParam(':pc', $pc);
                     $stmt->execute();

                     $login = $stmt->fetchAll(PDO::FETCH_ASSOC);
                     // Validando, caso tenha campo vazio!
                     if(count($login) <= 0){
                     	echo "Senha ou email vazio!";
                     	exit;
                     }
                     $usuario = $login[0];
                     // Criando uma sessão
                     session_start();
                     // Guardando as váriaveis senha e email na SESSION principal.
                     $_SESSION['logged_in'] = true;
                     $_SESSION['UsuarioEmail'] = $login['email'];
                     $_SESSION['usuarioSenha'] = $login['senha'];
                     // Redirecionamento para o  painel principal.
                     header("Location: ../painel.php");
                     

				}     
        }
             else
              	echo "Erro no banco de dados!";
        ?>
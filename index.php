<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <title>Sistema EPC</title>
    <meta charset="utf-8">
  </head>
  <body>
    <form action="src/login.php" method="post">
    	<div>
    		<label for="email">Email</label>
    		<input type="text" id="email" name="email_usuario" />
    	</div>
    	<div>
    		<label for="senha">Senha</label>
    		<input type="password" id="senha" name="senha_usuario"/>
    	</div>
    	<div>
    		<input type="submit" name="enviar" value="Entrar"/>
    		<button type="reset">Limpar</button>
    	</div>
    </form>
  </body>
</html>
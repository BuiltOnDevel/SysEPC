<?php
// Definindo o root da aplicação!
define("ROOT", __DIR__ ."/");
define("HTTP", ($_SERVER["SERVER_NAME"] == "localhost")
   ? "http://localhost/sis-EPC/"
   : "http://sistema/"
);

// Função para validar a $_ SESSION de acesso!
function confirmaUsuario()
{
    if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true)
    {
        return false;
    }
 
    return true;
}
?>
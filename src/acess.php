<?php
 
require_once 'config.php';
 
if (!confirmaUsuario())
{
	echo "Você não está logado!";
    header('Location: index.php');
}
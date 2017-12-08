<?php
   require("../config.php");
//redirecionando o logout para index.
      $_SESSION['logged_in'] = false;
      session_start(); 
      session_destroy(); 
      header("Location: ../index.php"); exit;
  ?>

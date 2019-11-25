<?php
  session_start();
if((!isset ($_SESSION['nome_usuario']) == true) and (!isset ($_SESSION['senha']) == true))
{
  unset($_SESSION['nome_usuario']);
  unset($_SESSION['senha']);
  header('location:login.php');
  }
?>
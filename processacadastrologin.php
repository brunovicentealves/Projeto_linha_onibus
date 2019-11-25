<?php

include_once("conexao.php");
$usuario=$_POST['usuario'];
$senha=$_POST['senha'];

if(!empty($usuario) && !empty($senha)){

    $inserir = $pdo->prepare("INSERT INTO usuario (nome_usuario,senha) VALUES (:valor1,:valor2)");

    $inserir->bindValue(":valor1",$usuario);
    $inserir->bindValue(":valor2",$senha);
    
    $inserir->execute();
    header("Location:login.php");

}else{

    header("Location:login.php");
}

?>
<?php


include_once("conexao.php");
    
 $usuario_nome = $_POST['nome_usuario'];
 $senha = $_POST['senha'];

 $sql = "SELECT nome_usuario,senha FROM usuario WHERE nome_usuario= :usuario AND senha = :senha LIMIT 1";
 $stmt = $pdo->prepare($sql);
 
$stmt->bindParam(':usuario', $usuario_nome);
$stmt->bindParam(':senha', $senha);
$stmt->execute();
$users = $stmt->fetchAll(PDO::FETCH_ASSOC);

foreach( $users as $user){
  $usuario=$user['nome_usuario'];
 $senha= $user['senha'];

}
  
 if($users!= NULL){
    //crias as 
    session_start();
    $_SESSION['login_usuario']=$usuario;
    $_SESSION['senha']=$senha;

   
    header("Location:admin.php");
    
 }else{

   $_SESSION['mensagem']="Senha ou usuário incorreto !";
   echo " não conectou";
    //header("Location:login.php");
 }


 

?>
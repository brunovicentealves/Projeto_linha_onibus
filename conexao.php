<?php
 $dsn = 'mysql:host=localhost;dbname=rota_onibus';
 $user = 'root';
 $pass = '';
 try {
   $pdo = new PDO($dsn, $user, $pass);
 } catch (PDOException $e) {
   echo 'Erro: '.$e->getMessage();
 }

 ?>
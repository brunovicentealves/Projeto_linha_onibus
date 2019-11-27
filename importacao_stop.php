<?php

include_once("conexao.php");

$dados_arquivo = file ('C:\xampp\htdocs\Rotas_onibus\gtfs\stops.txt');

foreach($dados_arquivo as $linha)
    {
    echo $linha;
    $linha = trim($linha);
    $valor = explode(',',$linha);
    
    $sql = "INSERT INTO stop (stop_id,stop_code,stop_name,stop_desc,stop_lat,stop_lon) 
    VALUES (?,?,?,?,?,?);";
    $stmt = $pdo->prepare($sql);
    $stmt->execute($valor);
    
    }
    


?>
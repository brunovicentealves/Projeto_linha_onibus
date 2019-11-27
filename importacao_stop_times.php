<?php

include_once("conexao.php");
ini_set('memory_limit', '5000m');

$dados_arquivo = file ('C:\xampp\htdocs\Rotas_onibus\gtfs\stop_times.txt');

foreach($dados_arquivo as $linha)
    echo $linha;
    {
    $linha = trim($linha);
    $valor = explode(',',$linha);
    
    $sql="INSERT INTO stop_times (trip_id,arrival_time,departure_time,stop_id,stop_sequence) 
    VALUES(?,?,?,?)";

    $stmt = $pdo->prepare($sql);
    $stmt->execute($valor);
    
    }
    


?>
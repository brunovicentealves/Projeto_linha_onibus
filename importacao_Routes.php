<?php

include_once("conexao.php");

$dados_arquivo = file ('C:\xampp\htdocs\Rotas_onibus\gtfs\routes.txt');

foreach($dados_arquivo as $linha)
    echo $linha;
    {
    $linha = trim($linha);
    $valor = explode(',',$linha);
    
    $sql = "INSERT INTO routes (route_id,agency_id,route_short_name,route_long_name,
    route_desc,route_type,route_url, route_color,route_text_color) VALUES (?,?,?,?,?,?,?,?,?);";

    $stmt = $pdo->prepare($sql);
    $stmt->execute($valor);
    
    }
    


?>
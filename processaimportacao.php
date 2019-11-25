<?php

include_once("conexao.php");

$arquivo_tmp = $_FILES['arquivo']['tmp_name'];
$nome_arquivo = $_FILES['arquivo']['name'];
$dados_arquivo = file($arquivo_tmp);

if($nome_arquivo == "routes.txt"){

    foreach($dados_arquivo as $linha)
    {
    $linha = trim($linha);
    $valor = explode(',',$linha);
    //var_dump($valor);

    $sql = "INSERT INTO routes (route_id,agency_id,route_short_name,route_long_name,
    route_desc,route_type,route_url, route_color,route_text_color) VALUES (?,?,?,?,?,?,?,?,?);";

    $stmt = $pdo->prepare($sql);
    $stmt->execute($valor);
    
    }

    echo "Importado com sucesso";
        

}elseif($nome_arquivo == "trips.txt"){


            foreach($dados_arquivo as $linha)
        {
        $linha = trim($linha);
        $valor = explode(',',$linha);
        //var_dump($valor);

        $sql = "INSERT INTO trips (route_id,service_id,trip_id,trip_headsign,trip_short_name,direction_id,block_id,shape_id,wheelchair_accessible,trip_time)
         VALUES (?,?,?,?,?,?,?,?,?,?);";

        $stmt = $pdo->prepare($sql);
        $stmt->execute($valor);
        
        }

        echo "Importado com sucesso";
    
}elseif($nome_arquivo == "stop.txt"){

    foreach($dados_arquivo as $linha)
    {
    $linha = trim($linha);
    $valor = explode(',',$linha);
    //var_dump($valor);

    $sql = "INSERT INTO routes (stop_id,stop_code,stop_name,stop_desc,stop_lat,stop_lon) 
    VALUES (?,?,?,?,?,?);";

    $stmt = $pdo->prepare($sql);
    $stmt->execute($valor);
    
    }

    echo "Importado com sucesso";


}elseif($nome_arquivo == "stop_times.txt"){

    foreach($dados_arquivo as $linha)
    {
    $linha = trim($linha);
    $valor = explode(',',$linha);
    //var_dump($valor);

    $sql = "INSERT INTO routes (trip_id,arrival_time,departure_time,stop_id,stop_sequence) 
    VALUES (?,?,?,?,?);";

    $stmt = $pdo->prepare($sql);
    $stmt->execute($valor);
    
    }

    echo "Importado com sucesso";





}

?>
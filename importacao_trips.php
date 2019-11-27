<?php
try {
    
    include_once("conexao.php");

    $dados_arquivo = file ('C:\xampp\htdocs\Rotas_onibus\gtfs\trips.txt');
    
    foreach($dados_arquivo as $linha)
    {
        echo $linha;
        $linha = trim($linha);
         $valor = explode(',',$linha);
        $route_id = $valor[0];
        $service_id = $valor[1];
        $trip_id = $valor[2];
        $trip_headsign = $valor[3];
        $trip_short_name = $valor[4];
        $direction_id = $valor[5];
        $block_id= $valor[6];
        $shape_id= $valor[7];
        $wheelchair_accessible = $valor[8];
        $trip_time = $valor[9];


    $sql = "INSERT INTO trips (route_route_id,service_id,trip_id,trip_headsign,trip_short_name,direction_id,block_id,shape_id,wheelchair_accessible,trip_time)
     VALUES (:route_id,:service_id,:trip_id,:trip_headsign,:trip_short_name,:direction_id,:block_id,:shape_id,:wheelchair_accessible,:trip_time)";
    $stmt = $pdo->prepare($sql);

    $stmt->bindParam(':route_id',  $route_id);
    $stmt->bindParam(':service_id', $service_id);
    $stmt->bindParam(':trip_id', $trip_id);
    $stmt->bindParam(':trip_headsign', $trip_headsign);
    $stmt->bindParam('trip_short_name', $trip_short_name);
    $stmt->bindParam(':direction_id',  $direction_id);
    $stmt->bindParam(':block_id', $block_id);
    $stmt->bindParam(':shape_id', $shape_id);
    $stmt->bindParam(':wheelchair_accessible', $wheelchair_accessible);
    $stmt->bindParam(':trip_time', $trip_time);
    
    $stmt->execute();
    
    }
} catch (PDOException $e) {
    echo $sql . "<br>" . $e->getMessage();
}

    
    
    


?>
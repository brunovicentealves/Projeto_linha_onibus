<?php
try {
    
    include_once("conexao.php");

    ini_set('memory_limit', '5000m');
    
    $dados_arquivo = file ('C:\xampp\htdocs\Rotas_onibus\gtfs\stop_times.txt');
    
    foreach($dados_arquivo as $linha)
        
        {
        echo $linha;
        $linha = trim($linha);
        $valor = explode(',',$linha);
    
        $trip_id = $valor[0];
        $arrival_time=$valor[1];
        $departure_time = $valor[2];
        $stop_id=$valor[3];
        $stop_sequence=$valor[4];
    
        
        $sql="INSERT INTO stop_times (trip_id,arrival_time,departure_time,stop_id,stop_sequence) 
        VALUES(:trip_id,:arrival_time,:departure_time,:stop_id,:stop_sequence)";
    
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':trip_id', $trip_id);
        $stmt->bindParam(':arrival_time', $arrival_time);
        $stmt->bindParam(':departure_time', $departure_time);
        $stmt->bindParam(':stop_id', $stop_id);
        $stmt->bindParam(':stop_sequence',$stop_sequence);
        
        $stmt->execute();
        
        }


} catch (PDOException $e) {
    echo $sql . "<br>" . $e->getMessage();
}

    


?>
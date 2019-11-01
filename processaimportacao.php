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
        

}elseif($nome_arquivo == "stop.txt"){


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
    
}

?>
<?php
try {
   
    $dsn = 'mysql:host=localhost;dbname=rotas';
    $user = 'root';
    $pass = '';
     try {
   $pdo = new PDO($dsn, $user, $pass);
    } catch (PDOException $e) {
    echo 'Erro: '.$e->getMessage();
    }

    // criação do banco 
    $sql = "Create Database Rotas";
    $pdo->exec($sql);
    print("Criar banco\n");
    
    //criação das tabelas
    $sql = "CREATE TABLE IF NOT EXISTS routes( 
    route_id varchar(100) PRIMARY KEY, 
    agency_id varchar (100), 
    route_short_name varchar(100), 
    route_long_name varchar (100), 
    route_desc varchar(100), 
    route_type varchar(100), 
    route_url varchar(100), 
    route_color varchar(100),
    route_text_color varchar (100))";

    $pdo->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
    $pdo->exec($sql);
    
    print("Criado tabelas Routes\n");


    $sql = "CREATE TABLE  IF NOT EXISTS usuario (
        id_usuario int NOT NULL AUTO_INCREMENT PRIMARY KEY,
        nome_usuario varchar(100),
        senha varchar (100)
        );";
    
        $pdo->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
        $pdo->exec($sql);
        
        print("Criado tabelas usuario\n");


        $sql = "CREATE TABLE IF NOT EXISTS trips (
            trip_id varchar(100) PRIMARY KEY,
            route_id varchar(100),
            service_id varchar(100),
            trip_headsign varchar(100),
            trip_short_name varchar(100),
            direction_id varchar(100),
            block_id varchar(100),
            shape_id varchar(100),
            wheelchair_accessible varchar(100),
            trip_time varchar(100)
        );";
        
            $pdo->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
            $pdo->exec($sql);
            
            print("\n Criado tabelas trips");

            $sql = "CREATE TABLE IF NOT EXISTS stop_times (
                trip_id varchar(100),
                    arrival_time varchar(100),
                    departure_time varchar(100),
                    stop_id varchar(100) PRIMARY KEY,
                    stop_sequence varchar(100)
                );";
            
                $pdo->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
                $pdo->exec($sql);
                
                print("\n Criado tabelas stop_times");


                $sql = "CREATE TABLE  IF NOT EXISTS stop (
                    stop_id varchar(100) PRIMARY KEY,
                    stop_code varchar(100) ,
                    stop_name varchar(100),
                    stop_desc varchar(100),
                    stop_lat varchar(100),
                    stop_lon varchar(100)
                );";
                
                    $pdo->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
                    $pdo->exec($sql);
                    
                    print("\n Criado tabelas stop");

                    
                $sql = "ALTER TABLE trips ADD CONSTRAINT  FOREIGN KEY(route_id) REFERENCES routes(route_id);";
                
                    $pdo->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
                    $pdo->exec($sql);
                    
                    print("\n Criado tabelas relcionamento Route_id");

                    $sql = "ALTER TABLE stop_times ADD CONSTRAINT  FOREIGN KEY(trip_id) REFERENCES trips(trip_id);";
                
                    $pdo->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
                    $pdo->exec($sql);
                    
                    print("\n Criado tabelas relcionamento trip_id");

                    $sql = "ALTER TABLE stop_times ADD CONSTRAINT  FOREIGN KEY(stop_id) REFERENCES stop(stop_id);";
                
                    $pdo->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
                    $pdo->exec($sql);
                    
                    print("\n Criado tabelas relcionamento stop_id");





                


} catch(PDOException $e)
{
    echo $sql . "<br>" . $e->getMessage();
}

?>

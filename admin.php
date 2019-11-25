<?php
include_once("seguranca.php");
?>

<!DOCTYPE html>
<html lang="br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <title>Admin</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #1E90FF;">
  <a class="navbar-brand" href="#">Rotas Onibus</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarText">
    <ul class="navbar-nav mr-auto">
      <!--<li class="nav-item active">
        <a class="nav-link" href="#">Home</span></a>
      </li>-->
    </ul>
    <span class="navbar-text">
    <div class="btn-group">
  <a type="text" data-toggle="dropdown" data-display="static" aria-haspopup="true" aria-expanded="false">
  <?php echo$_SESSION['login_usuario'];?>  <img src="img/user.png" alt="..." class="rounded-pill">
</a>
  <div class="dropdown-menu dropdown-menu-lg-right">
  <button type="button" class="dropdown-item" data-toggle="modal" data-target=".bd-example-modal-lg">Perfil</button>
    <a class="dropdown-item" href="sair.php">Sair</a>
  </div>
</div>
    </span>
  </div>
</nav>
<div class="container-fluid">
  <br>
  <br>
  <form action="" method="POST"> 
  <div class="row">
  <div class="col-2">
    </div>
   
    <div class="col-6">
      <input type="text"  name="pesquisa" class="form-control" placeholder="Realize uma Busca">
    </div>
    <div class="col-4">
    <input name="acao"type="submit" class="btn btn-primary" value="Buscar">
    </div>
  </div>
</form>
<br>
<table class="table table-striped table-responsive-xl">
  <thead>
    <tr>
      <th scope="col">Numero</th>
      <th scope="col">Nome Onibus</th>
      <th scope="col">Paradas</th>
      
    </tr>
  </thead>
  <tbody>
    <!--<tr>
      <th scope="row">1</th>
      <td>Mark</td>
      <td>Otto</td>
      <td>@mdo</td>
      <td>@mdo</td>
    </tr>-->
    
  </tbody>
</table>
<?php
$acao = filter_input(INPUT_POST,'acao',FILTER_SANITIZE_STRING);
if($acao){
  include_once("conexao.php");
  $pesquisa = filter_input(INPUT_POST,'pesquisa', FILTER_SANITIZE_STRING);
 
  $sql ="SELECT route_short_name,route_long_name ,stop_name
  FROM routes r INNER JOIN trips t on r.route_id=r.route_id 
  INNER JOIN stop_times s on t.trip_id=s.trip_id
  INNER JOIN stop sp on s.stop_id=sp.stop_id WHERE route_id = :pesquisar";

  $stmt = $pdo->prepare($sql);

  $stmt->bindParam(':pesquisar', $pesquisa);

  $stmt->execute();
$resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);

if(empty($resultado)) echo" <b>não encontrou resultado<b>";
foreach( $resultado as $resul){
?>
<tr>
      <td><?=$resul['route_short_name']?></td>
      <td><?=$resul['route_long_name']?></td>
      <td><?=$resul['stop_name']?></td>
      
    </tr>


 <?php
}










}
?>
</div>
<!-- janela modal -->
<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title">Dados do Usuário</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    <div class="container-fluid">
      <br>
    <div class="row">
    <div class="col">
      <label >Nome :</label>
    </div>
    <div class="col">
    <label ><?php echo$_SESSION['login_usuario'];?> </label>
    </div>
  </div>

  <div class="row">
    <div class="col">
      <label >Senha :</label>
    </div>
    <div class="col">
      <label ><?php echo$_SESSION['senha'];?> </label>
    </div>
  </div>
<br>
</div>
    </div>
  </div>
</div>
</body>
</html>



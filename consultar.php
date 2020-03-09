<?php
//conexao com o bd
require_once 'conecta.php';
//Iniciar sessão
session_start();
//Verificação
if(!isset($_SESSION['logado'])):
    header('Location: login.php');
endif;

?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v3.8.5">
    <title>Starter Template · Bootstrap</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.3/examples/starter-template/">

    <!-- Bootstrap core CSS -->
    <link href="node_modules/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link rel="stylesheet" href="node_modules/font-awesome/css/font-awesome.min.css">

    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>
    <!-- Custom styles for this template -->
    <link href="css/starter-template.css" rel="stylesheet">
</head>

<body>
    <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
        <a class="navbar-brand" href="#">Olá, <?php echo $_SESSION['usuario_nome']; ?>!</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault"
            aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="cadastrar.php">Cadastrar</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="consultar.php">Consultar</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="estatisticas.php">Estatísticas</a>
                </li>
            </ul>
            <form class="form-inline my-2 my-lg-0">
            <a class='btn btn-secondary my-2 my-sm-0' href='logout.php' name='sair'>Sair</a>
                    </form>
        </div>
    </nav>

    <main role="main" class="container">
        <div class="starter-template">
            <h1>Consulta de Informações</h1>
            <form action="get">
      <table class="table table-hover">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Cpf</th>
          <th scope="col">Nome</th>
          <th scope="col">Email</th>
          <th scope="col">Idade</th>
          <th scope="col">Endereço</th>
          <th scope="col">Sexo</th>
          <th scope="col">Preferências</th>
        </tr>
      </thead>
      <tbody>


<?php
    include_once "conecta.php";
    $sql = mysqli_query($con, "SELECT * from usuarios");

        $i = 0;
    while($row = mysqli_fetch_array($sql)){
      $cpf = $row["cpf"];
      $nome = $row["nome"];
      $email = $row["email"];
      $idade = $row["idade"];
      $endereco = $row["endereco"];
      $sexo = $row["sexo"];
      $preferencias = $row["pref"];
      
      echo "<tr>";
      echo "<th scope='row'>".$i."</th>";
      echo "<td>".$cpf."</td>";
      echo "<td>".$nome."</td>";
      echo "<td>".$email."</td>";
      echo "<td>".$idade."</td>";
      echo "<td>".$endereco."</td>";
      echo "<td>".$sexo."</td>";
      echo "<td>".$preferencias."</td>";
      echo "<td>";
      echo "<a class='btn btn-danger' href='delete.php?cpf=$cpf'  name='delete'><i class='fa fa-trash-o fa-lg'></i></a>";
      echo "<a class='btn btn-warning' href='atualizacad.php?cpf=$cpf' name='atualiza'><i class='fa fa-pencil fa-lg'></i></a>";
      echo "</td>";
      echo "</tr>";
      
      $i++;
      
  }
?>
       </tbody>
      </table> 
      </form>

        </div>

    </main><!-- /.container -->
    <div class="card bg-light">
            <p class="mt-5 mb-3 text-muted text-center">Desenvolvido por Jaqueline Luiza Leite &copy; 2019</p>
          </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="node_modules/jquery/dist/jquery.slim.min.js"><\/script>')</script>
    <script src="node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-xrRywqdh3PHs8keKZN+8zzc5TX0GRTLCcmivcbNJWm2rs5C8PRhcEn3czEjhAO9o"
        crossorigin="anonymous"></script>
</body>

</html>
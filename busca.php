<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
  <meta name="generator" content="Jekyll v3.8.5">
  <title>Atualização do cadastro de Pessoas</title>

  <link rel="canonical" href="https://getbootstrap.com/docs/4.3/examples/starter-template/">

  <!-- Bootstrap core CSS -->
  <link href="node_modules/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

  <link href="node_modules/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  
  <script type="text/javascript"
    src="https://gc.kis.v2.scr.kaspersky-labs.com/FD126C42-EBFA-4E12-B309-BB3FDD723AC1/main.js"
    nonce="15FAF644A64BCC4DB4C6239643D174B6" charset="UTF-8"></script>
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

    body {
      padding-top: 5rem;
    }

    .starter-template {
      padding: 3rem 1.5rem;
      text-align: center;
    }
  </style>

</head>

<body>
  <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
    <a class="navbar-brand" href="#">Cadastro de Pessoas</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault"
      aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarsExampleDefault">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link active" href="index.php">Listar</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="cadastrar.php">Cadastrar</a>
        </li>
      
      </ul>
      
    </div>
  </nav>


  <main role="main" class="container">
    <div class="starter-template">
    <form style='text-align: left;' method='get' action='atualiza.php'>
    <div class='form-row'>
        <div class="form-group col-md-4">
            <label for='cpf'>CPF:</label>
            <input type='text' name='cpf' class="form-control">  
        </div>
        <div class="form-group col-md-4">
        <label for=""></label>
            <a class='btn btn-danger row-md-4' href='delete.php' name='delete'><i class='fa fa-trash-o fa-lg'></i></a>   
        </div>
        </form>
    </div>

<?php
    include_once "conecta.php";
    $sql = mysqli_query($con, "SELECT *from pessoas where cpf='$_GET[cpf]'");

    
    while($row = mysqli_fetch_array($sql)){
      $cpf = $row["cpf"];
      $nome = $row["nome"];
      $idade = $row["idade"];
    }
    if($_GET['cpf'] == $cpf){
    echo"<form style='text-align: left;' method='post' action='insere.php'>";
      
    echo"<div class='form-row'>";
    echo"<div class='form-group col-md-4'>";
    echo"<label for='cpf'>CPF:</label>";
    echo"<input type='hidden' class='form-control' name='cpf' id='cpf' value='.'$cpf'.'>";
    echo"</div>";
    echo"<div class='form-group col-md-8'>";
    echo"<label for='nome'>Nome:</label>";
    echo"<input type='text' class='form-control' name='nome' id='nome' value='.'$nome'.'>";

    echo"</div>";
    echo"<div class='form-row'>";
    echo"<div class='form-group col-md-6'>";
    echo"<label for='idade'>Idade:</label>";
    echo"<input type='number' class='form-control' name='idade' id='idade' value='.'$idade'.'>";
    echo"</div>";
    echo"</div>";
    echo"</div>";
    echo"<br>";
    echo"<br>";
    echo"<a class='btn btn-warning' href='atualiza.php' name='atualiza'> <i class='fa fa-pencil fa-lg'></i></a>";
    echo"<button type='reset' class='btn btn-warning'>Limpar</button>";
    echo"</form>";
}
?>
    </div>

  </main><!-- /.container -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
  <script>window.jQuery || document.write('<script src="node_modules/jquery/dist/jquery-slim.min.js"><script>')</script>
  <script src="node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="node_modules/popper.js/dist/popper.min.js"></script>
</body>

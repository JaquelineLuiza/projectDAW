<?php
   //Conexao com o bd
   require_once 'conecta.php';

   //sessao
   session_start();

  // Verifica se houve POST e se o usuário ou a senha é(são) vazio(s)
  if(isset($_POST['btn-entrar'])):
    $erros = array();
    $login = mysqli_escape_string($con, $_POST['login']);
    $senha = mysqli_escape_string($con, $_POST['senha']);

    if(empty($login) or empty($senha)):
      $erros[] = "<script>alert('O campo login/senha precisa ser preenchido!');</script>";
    else:
      $sql = mysqli_query($con, "select email from usuarios where email = '$login'");

      if(mysqli_num_rows($sql) > 0):
        $senha = md5($senha);
        $sql = mysqli_query($con, "select * from usuarios where email = '$login' and senha='$senha'");
        mysqli_close($con);
        if(mysqli_num_rows($sql) == 1):
          $dados = mysqli_fetch_array($sql);
          mysqli_close($con);
          $_SESSION['logado'] = true;
          $_SESSION['cpf'] = $dados['cpf'];
          $_SESSION['usuario_nome'] = $dados['nome'];
          $nivel = $dados['nivel'];

          if($nivel == 1):
            header('Location: index.php');

            else:
              header('Location: areausuario.php');
          endif;
        else:
          $erros[] = "<script>alert('Usuário e senha não conferem!');</script>";
        endif;

      else:
        $erros[] ="<script>alert('Usuário inexistente!');</script>";
      endif;

    endif;

  endif;
  ?>
<!doctype html>
<script src="text/javascript"></script>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v3.8.5">
    <title>Floating labels example · Bootstrap</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.3/examples/floating-labels/">

    <!-- Bootstrap core CSS -->
<link href="node_modules/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">


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
    <link href="css/floating-labels.css" rel="stylesheet">
  </head>
  <body class="bg-dark text-white">
  <?php
  if(!empty($erros)){
    foreach($erros as $erro){
      echo $erro;
    }
  }
?>
    <form class="form-signin" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
  <div class="text-center mb-4">
    <img class="mb-4" src="img/shopping.png" alt="" width="72" height="72">
    <h1>Login</h1>
      </div>


  <div class="form-label-group">
    <input type="email" id="inputEmail" class="form-control" name="login" placeholder="Email address" required autofocus >
    <label for="inputEmail">Endereço de email</label>
  </div>

  <div class="form-label-group">
    <input type="password" id="inputPassword" class="form-control" name="senha" placeholder="Password" required>
    <label for="inputPassword">Senha</label>
  </div>

  <div class="checkbox mb-3">
    <a href="rescuperacao.php">Recuperar senha</a>
  </div>
  <button class="btn btn-lg btn-primary btn-block" type="submit" name="btn-entrar">Entrar</button>
  <br>
  <p>Se você ainda não tem uma conta</p>
  <a class="btn btn-lg btn-primary btn-block" href='cad_usuario.php'>Inscreva-se</a>
 

            <p class="mt-5 mb-3 text-muted text-center">Desenvolvido por Jaqueline Luiza Leite &copy; 2019</p>

</form>
</body>
</html>

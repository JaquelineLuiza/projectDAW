<?php
//conexao com o bd
require_once 'conecta.php';
//Iniciar sessão
session_start();
//Verificação
if(!isset($_SESSION['logado'])):
    header('Location: login.php');
endif;

$cpf = $_GET['cpf'];

    $sql = mysqli_query($con, "select * from usuarios where cpf='$cpf'");
    while($row = mysqli_fetch_array($sql)){
        $nome = $row["nome"];
        $email = $row["email"];
        $idade = $row["idade"];
        $endereco = $row["endereco"];
      }
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

    <!--Script para colocar mascara em diferentes inputs-->
    <script type="text/javascript">
			function fMasc(objeto,mascara) {
				obj=objeto
				masc=mascara
				setTimeout("fMascEx()",1)
			}
			function fMascEx() {
				obj.value=masc(obj.value)
			}
			function mTel(tel) {
				tel=tel.replace(/\D/g,"")
				tel=tel.replace(/^(\d)/,"($1")
				tel=tel.replace(/(.{3})(\d)/,"$1)$2")
				if(tel.length == 9) {
					tel=tel.replace(/(.{1})$/,"-$1")
				} else if (tel.length == 10) {
					tel=tel.replace(/(.{2})$/,"-$1")
				} else if (tel.length == 11) {
					tel=tel.replace(/(.{3})$/,"-$1")
				} else if (tel.length == 12) {
					tel=tel.replace(/(.{4})$/,"-$1")
				} else if (tel.length > 12) {
					tel=tel.replace(/(.{4})$/,"-$1")
				}
				return tel;
			}
			function mCNPJ(cnpj){
				cnpj=cnpj.replace(/\D/g,"")
				cnpj=cnpj.replace(/^(\d{2})(\d)/,"$1.$2")
				cnpj=cnpj.replace(/^(\d{2})\.(\d{3})(\d)/,"$1.$2.$3")
				cnpj=cnpj.replace(/\.(\d{3})(\d)/,".$1/$2")
				cnpj=cnpj.replace(/(\d{4})(\d)/,"$1-$2")
				return cnpj
			}
			function mCPF(cpf){
				cpf=cpf.replace(/\D/g,"")
				cpf=cpf.replace(/(\d{3})(\d)/,"$1.$2")
				cpf=cpf.replace(/(\d{3})(\d)/,"$1.$2")
				cpf=cpf.replace(/(\d{3})(\d{1,2})$/,"$1-$2")
				return cpf
			}
			function mCEP(cep){
				cep=cep.replace(/\D/g,"")
				cep=cep.replace(/^(\d{2})(\d)/,"$1.$2")
				cep=cep.replace(/\.(\d{3})(\d)/,".$1-$2")
				return cep
			}
			function mNum(num){
				num=num.replace(/\D/g,"")
				return num
			}
		</script>
</head>

<body>
    <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
        <a class="navbar-brand" href="#">Olá, <?php echo $_SESSION['usuario_nome']; ?>!</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault"
            aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <<div class="collapse navbar-collapse" id="navbarsExampleDefault">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                </li>
               
                <li class="nav-item active">
                <?php
                echo "<a class='nav-link' href='atualizacadCliente.php?cpf=$cpf' name='altera'>Alterar</a>";
                    ?>
                </li>
                
            </ul>
            <form class="form-inline my-2 my-lg-0">
            <a class='btn btn-secondary my-2 my-sm-0' href='logout.php' name='sair'>Sair</a>
            </form>
        </div>
    </nav>

    <main role="main" class="container">
        <div class="starter-template">
            <h1>Atualização de Cadastro</h1>
        </div>
        <div>
            <form method="POST" action="atualiza.php">
            <fieldset disabled>
            <div class="form-group">
            <label for="disabledTextInput">CPF</label>
            <input type="text" id="disabledTextInput" class="form-control" value="<?php echo $cpf;?>">
            </div>
            </fieldset>
                <div class="form-group">
                    <label for="exampleFormControlInput1">Nome completo</label>
                    <input type="text" class="form-control" id="exampleFormControlInput1" required="required" name="nome" value="<?php echo $nome;?>">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">Email</label>
                    <input type="email" class="form-control" id="exampleFormControlInput1" required="required" name="email" value="<?php echo $email;?>">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">Senha</label>
                    <input type="text" class="form-control" id="exampleFormControlInput1" required="required" name="senha">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">Idade</label>
                    <input type="number" class="form-control" id="exampleFormControlInput1" required="required" name="idade" value="<?php echo $idade;?>">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">Endereço</label>
                    <input type="text" class="form-control" id="exampleFormControlInput1" required="required" name="endereco" value="<?php echo $endereco;?>">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">Sexo</label>

                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="sexo" id="exampleRadios1"
                            value="F" checked>
                        <label class="form-check-label" for="exampleRadios1">
                            Feminino
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="sexo" id="exampleRadios2"
                            value="M">
                        <label class="form-check-label" for="exampleRadios2">
                            Masculino
                        </label>
                    </div>
                </div>

                </div>

                <div class="form-group">
                    <label for="exampleFormControlInput1">Preferências de compra</label>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="1" id="defaultCheck1" name="id_preferencias">
                        <label class="form-check-label" for="defaultCheck1">
                            Livros
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="2" id="defaultCheck2" name="preferencias">
                        <label class="form-check-label" for="defaultCheck2">
                            Jogos
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="3" id="defaultCheck3" name="preferencias">
                        <label class="form-check-label" for="defaultCheck3">
                            Móveis
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="4" id="defaultCheck4" name="preferencias">
                        <label class="form-check-label" for="defaultCheck4">
                            Eletrodomésticos
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="5" id="defaultCheck5" name="preferencias">
                        <label class="form-check-label" for="defaultCheck5">
                            Brinquedos
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="6" id="defaultCheck6" name="preferencias">
                        <label class="form-check-label" for="defaultCheck6">
                            Informática
                        </label>
                    </div>
                </div>
                <button type="submit" class="btn btn-dark">Enviar dados</button>
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
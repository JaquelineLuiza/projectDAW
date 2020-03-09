<?php
    include_once "conecta.php";
    $string = $_POST['senha'];
    $senhacodificada = md5($string);

    $nomePost = $_POST['nome'];
    $nome = strtoupper($nomePost);

    $cpf = $_POST['cpf'];
    $pref = implode(",", $_POST['check']);
    $sql = mysqli_query($con, "INSERT INTO usuarios VALUES ('$_POST[cpf]', '$nome', '$_POST[email]', '$senhacodificada','$_POST[idade]', '$_POST[endereco]', '$_POST[sexo]', '$_POST[nivel]', '$pref')");

    foreach($_POST['check'] as $value){
        
        $sql2 = mysqli_query($con, "INSERT INTO preferencias_usuario VALUES ('$cpf', '$value')");
    }

    header('Location: index.php');
    mysqli_close($con);

?>
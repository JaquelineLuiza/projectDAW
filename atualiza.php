<?php

    include_once "conecta.php";

    $cpf= $_GET['cpf'];

    $sql = mysql_query("UPDATE dados SET nome='$nome',idade='$idade',sexo='$sexo' WHERE cpf='$cpf'")or die(mysql_error());

    header('Location: index.php');
    mysqli_close($con);
 
?>


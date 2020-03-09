<?php
    $servername = "localhost";
    $dbname = "projectecommerce";
    $usuario = "root";
    $password = "";

    //conecta o servidor sql
    $con = mysqli_connect("$servername", "$usuario", "$password", "$dbname");

    //Checa conexão
    if(mysqli_connect_error()){
        echo "Failed to connect to MySQL:".mysqli_connect_error();
    }

?>
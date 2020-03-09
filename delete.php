<?php
//conexao com o bd
require_once 'conecta.php';

echo '<SCRIPT LANGUAGE="JavaScript" TYPE="text/javascript">
decisao = confirm("Você realmente deseja excluir as informações deste usuário!");
if(decisao){
    decisao = true;
}else{
    decisao = false;
}
</SCRIPT>';

$cpf = $_GET['cpf'];
$decisao = "<script>document.write(decisao)</script>";
if ($decisao == true){
    $sql = mysqli_query($con, "delete from usuarios where cpf='$cpf'");
   echo '<script>window.location.href = "http://pt.stackoverflow.com"</script>';
    
    mysqli_close($con);
} else {
    echo '<script>window.location.href = "http://pt.stackoverflow.com"</script>';
    mysqli_close($con);
}

   
    
?>
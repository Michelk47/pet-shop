<?php 
session_start();
?>

<?php 
include 'conexao.php';

$Codigo = $_GET['Codigo'];

$result ="update  pessoa set cancelado = now() WHERE Codigo = '$Codigo'";
$dele= $PDO->prepare($result);
//$dele->bindValue(":Codigo", $Codigo);

if($dele->execute()){


    $_SESSION['msg'] = "<p style='color:green;'>Registro excluido com sucesso</p>"; 
    header("location: index.php"); 
   }
else{
    $_SESSION['msg'] = "<p style='color:red;'>Seu registro não foi excluido com sucesso</p>"; 
    header("location: index.php"); 
}




 ?>






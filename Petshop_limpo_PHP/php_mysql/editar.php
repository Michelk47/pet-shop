<?php 
session_start();
?>

<?php 

include "conexao.php";

$atualizar = filter_input(INPUT_POST, 'atualizar', FILTER_SANITIZE_STRING);
$nasc = filter_input(INPUT_POST, 'nasc', FILTER_SANITIZE_STRING);

$nome = filter_input(INPUT_POST, 'editar', FILTER_SANITIZE_STRING);
$Id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);


//  $up = "UPDATE pessoa SET Nome = $nome  WHERE  Codigo = $Codigo";
// $result=$PDO->prepare($up);
// $result->execute();

// $nome = $_POST['Nome'];
// $Codigo = $_GET['Codigo'];

$sql = "UPDATE pessoa SET Nome=:nome, Nascimento=:nasc WHERE Codigo = $Id"; 
          
$stmt = $PDO->prepare($sql);                                  
$stmt->bindParam(':nome', $nome); 
$stmt->bindParam(':nasc', $nasc); 


if($stmt->execute()){


    $_SESSION['msg'] = "<p style='color:green;'>Registro  editado com sucesso</p>"; 
    header("location: index.php"); 
   }
else{
    $_SESSION['msg'] = "<p style='color:red;'>Seu registro não foi editado com sucesso</p>"; 
    header("location: index.php"); 
}



?>
















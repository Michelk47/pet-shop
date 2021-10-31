<?php 
session_start();
include 'conexao.php';
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta id= "viewport" name="viewport" content="width=device-width, initial-scale=1">
    <title>yçyiyi</title>
</head>
    <body>
    <?php 
    if(isset($_SESSION['msg'])){
        echo $_SESSION['msg'];
        unset($_SESSION['msg']);
    }
    
    ?>
        <form  method="POST" action="inserir.php" >
            <input type="text" name="nome" required placeholder="Nome"/><br><br>
            <input type="date" id="calendario" name="nasc" required placeholder="Data de Nascimento"/><br><br>
            <input type="submit" name="inserir" value="Cadastrar"/>
        </form>
   

    
   
    
    
    
    
    
    
    </body>
</html>
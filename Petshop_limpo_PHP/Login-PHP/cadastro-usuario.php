<?php
  session_start();
  ob_start();
  $btnCadastro = filter_input(INPUT_POST,'btnCadastro', FILTER_SANITIZE_STRING);
  if($btnCadastro){
    include_once 'conexao.php';
    $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
    //var_dump($dados);
    $dados['senha'] = md5($dados['senha']);

    $resulto_usuario = "INSERT INTO usuario (Nome, Sobrenome, Email, Senha) VALUES(

                    '" .$dados['nome']. "',
                    '" .$dados['sobrenome']. "',
                    '" .$dados['email']. "',
                    '" .$dados['senha']. "'
                    )";
    $resultado = $PDO->query($resulto_usuario);
    $resultado_usuario = $resultado->fetchAll();
  
               
  }
?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="Cesar Szpak">
    <link rel="icon" href="imagens/dog.png">

    <title>Petshop Cadastrar</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/signin.css" rel="stylesheet">
   

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>


  <form class="form-signin" method="POST">
        <h2 class="form-signin-heading">Cadastro</h2>

        <?php 
        if(isset($_SESSION['msg'])){
				echo $_SESSION['msg'];
				unset($_SESSION['msg']);
			}?>

        <label for="inputEmail" class="sr-only">Nome</label>
        <input type="text" name="nome" id="inputEmail" class="form-control" placeholder="Nome"  autofocus><br>

        <label for="inputPassword" class="sr-only">Sobrenome</label>
        <input type="text" name="sobrenome" id="inputPassword" class="form-control" placeholder="Sobrenome" >

        <label for="inputEmail" class="sr-only">Email</label>
        <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Email"  autofocus>

        <label for="inputEmail" class="sr-only">Senha</label>
        <input type="password" name="senha" id="inputEmail" class="form-control" placeholder="Senha" autofocus>
        <input type="submit" name="btnCadastro"  class="btn btn-primary btn-block" value="Cadastrar"><br>
        <a href="index.php"><button type="button" class="btn btn-success btn-block">Logar</button></a>
      
      </form> 


    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="js/ie10-viewport-bug-workaround.js"></script>
    <script type="text/javascript" src="assest/js/paulo/jquery-3.3.1.slim.min.js"></script>
    <script type="text/javascript" src="assest/js/paulo/jquery-popper.min.js"></script>
    <script type="text/javascript" src="assest/js/paulo/bootstrap.min.js"></script>
  </body>
</html>





         <!-- <div class="container">
    <form>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Email</label>
      <input type="email" class="form-control" id="inputEmail4" placeholder="Email">
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Password</label>
      <input type="password" class="form-control" id="inputPassword4" placeholder="Password">
    </div>
  </div>

  <div class="form-group">
    <label for="inputAddress">Address</label>
    <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St">
  </div>
  <div class="form-group col-md-4">
    <label for="inputAddress2">Address 2</label>
    <input type="text" class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor">
  </div>
  <button type="submit" class="btn btn-primary">Sign in</button>
</form> -->
     
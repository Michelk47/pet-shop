<?php
	session_start();	
	//Incluindo a conexão com banco de dados
	include_once("conexao.php");	
	//O campo usuário e senha preenchido entra no if para validar
	if((isset($_POST['email'])) && (isset($_POST['senha']))){
	
		$usuario =  $_POST['email']; //Escapar de caracteres especiais, como aspas, prevenindo SQL injection
		$senha = $_POST['senha'];
		$senha = md5($senha); 
		//$senha = md5($senha);
		//die($senha);
		//Buscar na tabela usuario o usuário que corresponde com os dados digitado no formulário
		$result_usuario = "SELECT * FROM Usuario WHERE Email = '$usuario' && Senha = '$senha' LIMIT 1";
	
		//die($result_usuario);
		$resultado_usuario = $PDO->query($result_usuario);
		$resultado = $resultado_usuario->fetchAll();
		//die($resultado);
		//Encontrado um usuario na tabela usuário com os mesmos dados digitado no formulário
		if(empty($resultado)){
			$_SESSION['loginErro'] = "Usuario ou senha Inválida";
			header("Location: index.php");
			
		//Não foi encontrado um usuario na tabela usuário com os mesmos dados digitado no formulário
		//redireciona o usuario para a página de login
		}elseif(isset($resultado)){	
			//Váriavel global recebendo a mensagem de erro
			header("Location: \Petshop_limpo\indexpet.php");
		}
	//O campo usuário e senha não preenchido entra no else e redireciona o usuário para a página de login
	}else{
		$_SESSION['loginErro'] = "Usuário ou senha inválido";
		header("Location:index.php");
	}
?>
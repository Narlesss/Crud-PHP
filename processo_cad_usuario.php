<?php
session_start();
require_once("conexao.php");

$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
$telefone = filter_input(INPUT_POST, 'telefone', FILTER_SANITIZE_STRING);



	$nome_existe = false;
	$email_existe = false;
	$telefone_existe = false;
	

	//verificar se o usuário já existe
	$sql = " select * from usuarios where nome = '$nome' ";
	if($resultado = mysqli_query($conn, $sql)) {

		$dados_usuario = mysqli_fetch_array($resultado);

		if(isset($dados_usuario['nome'])){
			$nome_existe = true;
		}
	} 

	//verificar se o e-mail já existe
	$sql = " select * from usuarios where email = '$email' ";
	if($resultado = mysqli_query($conn, $sql)) {

		$dados_usuario = mysqli_fetch_array($resultado);

		if(isset($dados_usuario['email'])){
			$email_existe = true;
		} 
	}


	//verificar se o telefone  já exist
	$sql = " select * from usuarios where telefone = '$telefone' ";
	if($resultado = mysqli_query($conn, $sql)) {

		$dados_usuario = mysqli_fetch_array($resultado);

		if(isset($dados_usuario['telefone'])){
			$telefone_existe = true;
		} 
	} 


	if($nome_existe || $email_existe || $telefone_existe ){

		$retorno_get = '';

		if($nome_existe){
			$retorno_get.= "erro_nome=1&";
		}

		if($email_existe){
			$retorno_get.= "erro_email=1&";

		}

		if($telefone_existe){
			$retorno_get.= "erro_telefone=1&";
		}
		

		header('Location: cadastro.php?'.$retorno_get);
		die();
	}
/*

$sql = " insert into usuarios(usuario, email, telefone) values ('$usuario', '$email', '$telefone') ";*/

$sql = "INSERT INTO usuarios (nome, email, telefone) VALUES ('$nome', '$email', '$telefone')";
$resultado_usuario = mysqli_query($conn, $sql);


if(mysqli_insert_id($conn)){
	$_SESSION['msg'] = "<p style='color:blue;'>Usuário cadastrado com sucesso</p>";
	header("Location:index.php");
}else{      
	$_SESSION['msg'] = "<p style='color:red;'>Usuário não foi cadastrado </p>";
	header("Location: cadastro.php");

}	                                                           
?>

																																														
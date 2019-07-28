<?php
session_start();
include_once("conexao.php");


$id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
$telefone = filter_input(INPUT_POST, 'telefone', FILTER_SANITIZE_STRING);
//atualizar
$result_usuario = "UPDATE  usuarios  SET  nome='$nome', email='$email', telefone='$telefone' where id='$id'";
$resultado_usuario = mysqli_query($conn, $result_usuario);



//verificar de ouve alteração 
if(mysqli_affected_rows($conn)){
	$_SESSION['msg'] = "<p style='color:blue;'>Usuário Editado sucesso</p>";
	header("Location:index.php");
}else{
	$_SESSION['msg'] = "<p style='color:red;'> cadastro Não alterado!!</p>";
	header("Location: index.php?id=$id");
}

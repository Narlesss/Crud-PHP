<?php
session_start();
include_once("conexao.php");

$id = filter_input(INPUT_GET,'id', FILTER_SANITIZE_NUMBER_INT);
$result_usuario = "SELECT * FROM usuarios WHERE id='$id' ";
$resultado_usuario = mysqli_query($conn,$result_usuario);
$row_usuario = mysqli_fetch_assoc($resultado_usuario);

?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<title>CRUD  UPdate </title>
		 <!-- jquery - link cdn -->
		<script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>

		<!-- bootstrap - link cdn -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">	

		
	</head>
	<body>
		  
            <span >CRUD</span>
       
		
		<h1>Editar Cadastro</h1>
		<?php
		if(isset($_SESSION['msg'])){
			echo $_SESSION['msg'];
			unset($_SESSION['msg']);
		}
		?>
		<hr>
		
		<form method="POST" action="processo_edit_usuario.php">
		   <input type="hidden" name="id" value="
			<?php
			echo $row_usuario['id'];?>">
			<label>Nome: </label>
			<input type="text" name="nome" value="<?php echo $row_usuario['nome' ];?>"><br><br>
			
			<label>E-mail: </label>
			<input type="email" name="email"
			 value="<?php echo $row_usuario['email' ];?>"><br><br>
			
			

			<label>Telefone: </label>
			<input type="telefone" name="telefone"
			 value="<?php echo $row_usuario['telefone'  ];?>"><br><br>
			
			
			
			<input class="btn btn-info" type="submit" value="Editar">│
			<button class='btn btn-msg' a href="index.php">Voltar</button>
		</form>

			<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>	
	</body>
</html>
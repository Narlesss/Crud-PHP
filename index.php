<?php
session_start();
include_once("conexao.php");




	$erro = isset($_GET['erro']) ? $_GET['erro'] : 0;



?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<title>CRUD</title>

	     <!-- jquery - link cdn -->
		<script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>

		<!-- bootstrap - link cdn -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

	</head>
	<body>

		<!-- Static navbar -->
	    <nav class="navbar navbar-default navbar-static-top">
	      <div class="container">
	        <div class="navbar-header">
	          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
	            <span class="sr-only">Toggle navigation</span>
	            <span class="icon-bar"></span>
	            <span class="icon-bar"></span>
	            <span class="icon-bar"></span>
	          </button>
	          <h1>
	          Edição de Usuários</h1>
	        </div>
	        
	        <div id="navbar" class="navbar-collapse collapse">
	          <ul class="nav navbar-nav navbar-right">
	            <li><a href="cadastro.php"><b>Adicionar Usuário </b></a></li>
	            <li><a href="lista.php"><b>Lista de Usuários</b></a></li>
	          </ul>
	        </div><!--/.nav-collapse -->
	      </div>
	    </nav>
		       <div class="col-lg-8" align="center">
            <span ><center><h4>CRUD</h4></center></span>
        
              
       
       
		<?php
		if(isset($_SESSION['msg']))
		{
			echo $_SESSION['msg'];
			unset($_SESSION['msg']);
		}

		
        
		//Receber o número da página de acordo com o banco
		$pagina_atual = filter_input(INPUT_GET,'pagina', FILTER_SANITIZE_NUMBER_INT);		
		$pagina = (!empty($pagina_atual)) ? $pagina_atual : 1;
		
		//definir a quantidade de itens por pagina
		$qnt_result_pg = 3;
		
		//calcular o inicio visualização
		$inicio = ($qnt_result_pg * $pagina) - $qnt_result_pg;
		

		$result_usuarios = "SELECT * FROM usuarios LIMIT $inicio, $qnt_result_pg ; ";
		$resultado_usuarios = mysqli_query($conn, $result_usuarios);
		while($row_usuario = mysqli_fetch_assoc($resultado_usuarios))
		{
			
			echo "<hr><div> ID: " . $row_usuario['id'] . "<br>";
			echo "Nome: " . $row_usuario['nome'] . "<br>";
			echo "E-mail: " . $row_usuario['email'] . "<br>";
			echo "Telefone: " . $row_usuario['telefone'] . "<br><br>";
			echo " <a href='edit_usuario.php?id=" . $row_usuario['id'] . "'class='btn btn-default' >Editar</a>  ";
			echo "<a href='processo_apagar_usuario.php?id=" . $row_usuario['id'] . " 'onclick=\"return confirm('Tem certeza que deseja deletar esse registro?'); return false;\"'class='btn btn-info' >DELETAR</a><br><hr>
			</div>";
			
			
		} 
		

	
		//Paginção - Somar a quantidade de Usuario
		$result_pg = "SELECT COUNT(id) AS num_result FROM usuarios";
		$resultado_pg = mysqli_query($conn, $result_pg);
		$row_pg = mysqli_fetch_assoc($resultado_pg);
		
		//Quantidade de pagina 
		$quantidade_pg = ceil($row_pg['num_result'] / $qnt_result_pg);
		
		//Limitar os link antes depois
		$max_links = 3;
		echo "<a href='index.php?pagina=1'>Primeira</a> ";
		
		for($pag_ant = $pagina - $max_links; $pag_ant <= $pagina - 1; $pag_ant++){
			if($pag_ant >= 1){
				echo "<a href='index.php?pagina=$pag_ant'>$pag_ant</a> ";
			}
		}
			
		echo "$pagina ";
		
		for($pag_dep = $pagina + 1; $pag_dep <= $pagina + $max_links; $pag_dep++){
			if($pag_dep <= $quantidade_pg){
				echo "<a href='index.php?pagina=$pag_dep'>$pag_dep</a> ";
			}
		}
		
		echo "<a href='index.php?pagina=$quantidade_pg'>Ultima</a>";
		echo "<br><p>Copyright &copy; 2018--" . date("Y") . " <a href='https://www.linkedin.com/in/narles-silva-953b0b15b'>Narles S.S.<img src='imagens\iconein.png'alt=”some text” width=30 height=20</a></p>";
		?></div>

	

		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>	
	    
	</body>
	
</html>
<?php
  
 	session_start();

	$erro_nome	= isset($_GET['erro_nome'])	? $_GET['erro_nome'] : 0;
	$erro_email		= isset($_GET['erro_email'])	? $_GET['erro_email']	: 0;
	$erro_telefone	= isset($_GET['erro_telefone'])	? $_GET['erro_telefone']: 0;

	

?>

<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">

		<title>CRUD - Cadastrar</title>	
	    
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
	          <h1>Cadastrar Usuário</h1>
	        </div>
	        
	        <div id="navbar" class="navbar-collapse collapse">
	          <ul class="nav navbar-nav navbar-right">
	            <li><a href="index.php"><b>Voltar a Edição</b></a></li>
	            <li><a href="lista.php"><b>Home</b></a></li>
	          </ul>
	        </div><!--/.nav-collapse -->
	      </div>
	    </nav>

	<div class="container"> 	
		
		
		
		<div class="col-lg-8" >
			<form method="POST" action="processo_cad_usuario.php" id="formUsuario" class="<?= $erro == 1 ? 'open' : '' ?>">
			
			 <div class="form-group" >
				<label >Nome: </label>
	            <input type="text"  class="form-control" name="nome" placeholder="Digite o nome completo" id="nome" required="requiored">
				    <?php
						if($erro_nome){ // 1/true 0/false
							echo '<font style="color:#FF0000">Este Nome já existe</font>';
						}
					?>	
			</div>

			<div class="form-group" >	
				<label>E-mail: </label>
				<input type="email"  class="form-control" name="email" placeholder="Digite o seu melhor e-mail" id="email"  required="requiored">
	                <?php
						if($erro_email){ // 1/true 0/false
							echo '<font style="color:#FF0000">Este e-mail já existe</font>';
						}
					?>
            </div>
				
            <div class="form-group" >
				<label>Telefone: </label>
				<input type="text"  class="form-control" name="telefone" placeholder="Digite o Telefone" id="telefone" required="requiored">
				   <?php
						if($erro_telefone){ // 1/true 0/false
							echo '<font style="color:#FF0000">Telefone já existe</font>';
						}
					?>
			
			</div>

				<button class="btn btn-info form-control" type="submit" value="Cadastrar" >Salvar</button>  
				 
			
         </form>
        </div>

        
   </div><!--fecha container-->
		
		 <footer align="center"><?php
        echo "<br><p>Copyright &copy; 2018--" . date("Y") . " <a href='https://www.linkedin.com/in/narles-silva-953b0b15b'>Narles S.S.</a></p>";
        ?></footer>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>	
	</body>
</html>
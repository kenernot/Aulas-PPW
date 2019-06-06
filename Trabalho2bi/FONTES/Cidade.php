<?php
	// Inicia sessões 
	session_start(); 
	

	
	// Verifica se existe os dados da sessão de login 
	if(!isset($_SESSION["user"]) && !isset($_SESSION["nivel"])) { 
		// Usuário não logado! Redireciona para a página de login 
		header("Location: Login.php"); 
		exit; 
	} 
	
	include("include/head.php");
	include("include/top.php");
	include("include/connection/config.php");

	$con = new PDO($connectionString, USER,PASS);

	$result = $con->query("SELECT * FROM estado order by nome;");
?>

<div class="d-flex justify-content-center">
	<div class="form-group shadow col-md-7">

		<div class="form-row mt-4">
			<div class="col-md-12 text-center ">
				<hr>
				<p>Cadastro de cidade</p>
				<hr>
			</div>
			
		</div>
		<div class="form-row mb-4 d-flex justify-content-center ">
			<div class="col-md-1 ">
				<label for="nome" class="ml-2">Nome:</label>
			</div>
			<div class="col-md-3 ">
				<input type="text" maxlength="50" class="form-control bg bg-info text-light" name="nome" id="nome"></input>
			</div>
		</div>
		<div class="form-row my-4 d-flex justify-content-center ">
			<div class="col-md-1 ">
				<label for="nome" class="ml-2">Estado:</label>
			</div>
			<div class="col-md-3 ">
				<select class='form-control btn btn-info' name='estado' id='estado'>
					<?php
						while ($row = $result-> fetch(PDO::FETCH_OBJ)) {
							echo '<option value='.$row->idEstado.'</td>'.'<td>'.$row->nome.'</td>';
						}
					?>
                 </select>
			</div>
		</div>
		<div class="form-row d-flex justify-content-center ">
			<div class="col-md-5 text-center ">
				<hr>
				<div class="btn-group btn-block">
					<a href="/" class="btn btn-success">Cadastrar</a>
				</div>
				<hr>
			</div>
		</div>
	</div>
</div>

<?php
	include("include/bottom.php");
?>
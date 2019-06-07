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
	$sql = "SELECT * FROM estado ORDER BY sigla ASC;";
	$result = $con->query($sql);
?>

<div class="d-flex justify-content-center">
	<div class="form-group shadow col-md-6">

		<div class="form-row mt-4">
			<div class="col-md-12 text-center ">
				<hr>
				<p  class="h3">Cadastro de Cidade</p>
				<hr>
			</div>
		</div>
		
		<hr />
		<div role="form">
			<form class="form" method="POST" action="back/B_CadastroCidade.php">
				<div class="form group mx-2">
				
				
					<div class="form-row">
						<div class="col-md-5">
							<label for="nome" class="h6">Nome</label>
						</div>
					</div>
					<div class="form-row  mb-3">
						<div class="col-md-5">
							<input type="text" name="nome" id="nome" class="form-control" required>
						</div>
					</div>
					
					
					
					<div class="form-row">
						<div class="col-md-5">
							<label for="nome" class="h6">Estado</label>
						</div>
					</div>
					<div class="form-row">
						<div class="col-md-5">
							<select id="estado" name="estado" class="form-control" required>
								<?php
									while ($row = $result-> fetch(PDO::FETCH_OBJ)) {
										echo "<option value='".$row->idEstado."'>".$row->sigla."</option>";
									}
								?>
							</select>
						</div>
					</div>
					
					
					
					<hr />
					<div class="form-row">
						<div class="col-md-5">
							<input type="submit" value="SALVAR" class="btn btn-success btn-lg">
							<a href="Cidade.php" class="btn btn-outline-info">VOLTAR</a>
						</div>
					</div>
					<hr />
				</div>
			</form>
		</div>
		<hr />
		
	</div>
</div>

<?php
	include("include/bottom.php");
?>
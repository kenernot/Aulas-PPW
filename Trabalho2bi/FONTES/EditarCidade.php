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
	
	
	$sqlEstado = "SELECT * FROM estado ORDER BY sigla ASC;";
	$resultEstado = $con->query($sqlEstado);
	
	$get = $_GET["id"];
	preg_match('/^[0-9]*$/', $get, $matches, PREG_OFFSET_CAPTURE);
	
	if (count($matches) > 0) {
		$id = $_GET["id"];
	} else {
		header("Location: Erro.php");
	}
	
	$sql = "SELECT idCidade, nome, idEstado FROM cidade WHERE idCidade=$get;";
	$result = $con->query($sql);
	$numRows = $result->rowCount();
	
	if ($numRows == 0) {
		header("Location: Erro.php");
	}
	
	$idCidade = "";
	$nome = "";
	$idEstado = "";
	while ($row = $result-> fetch(PDO::FETCH_OBJ)) {
		$idCidade = $row->idCidade;
		$nome = $row->nome;
		$idEstado = $row->idEstado;
	}
?>

<div class="d-flex justify-content-center">
	<div class="form-group shadow col-md-6">

		<div class="form-row mt-4">
			<div class="col-md-12 text-center ">
				<hr>
				<p  class="h3">Editar cidade</p>
				<hr>
			</div>
		</div>
		
		<hr />
		<div role="form">
			<form class="form" method="POST" action="back/B_EditarCidade.php">
				<div class="form group mx-2">
				
					<?php 
						echo  "<input type='hidden' id='idCidade' name='idCidade' value='".$idCidade."'>";
					?>
					
					<div class="form-row">
						<div class="col-md-5">
							<label for="nome" class="h6">NOME</label>
						</div>
					</div>
					<div class="form-row  mb-3">
						<div class="col-md-5">
							<input type="text" name="nome" id="nome" class="form-control" required value="<?php echo $nome ?>">
						</div>
					</div>
					
					
					
					<div class="form-row">
						<div class="col-md-5">
							<label for="nome" class="h6">ESTADO</label>
						</div>
					</div>
					<div class="form-row">
						<div class="col-md-5">
							<select id="estado" name="estado" class="form-control" required>
								<?php
									while ($rowEstado = $resultEstado-> fetch(PDO::FETCH_OBJ)) {
										if ($rowEstado->idEstado != $idEstado) {
											echo "<option value='".$rowEstado->idEstado."'>".$rowEstado->sigla."</option>";
										} else {
											echo "<option value='".$rowEstado->idEstado."' selected>".$rowEstado->sigla."</option>";
										}
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
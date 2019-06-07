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
	
	$get = $_GET["id"];
	preg_match('/^[0-9]*$/', $get, $matches, PREG_OFFSET_CAPTURE);
	
	if (count($matches) > 0) {
		$id = $_GET["id"];
	} else {
		header("Location: Erro.php");
	}
	
	$sql = "SELECT c.idCidade, c.nome, c.idEstado, e.sigla FROM cidade c INNER JOIN estado e on e.idEstado = c.idEstado WHERE idCidade=$get;";
	$result = $con->query($sql);
	$numRows = $result->rowCount();
	
	if ($numRows == 0) {
		header("Location: Erro.php");
	}
	
	$idCidade = "";
	$nome = "";
	$idEstado = "";
	$sigla = "";
	while ($row = $result-> fetch(PDO::FETCH_OBJ)) {
		$idCidade = $row->idCidade;
		$nome = $row->nome;
		$idEstado = $row->idEstado;
		$sigla = $row->sigla;
	}
?>

<div class="d-flex justify-content-center">
	<div class="form-group shadow col-md-6">
		<div class="form-row mt-4">
			<div class="col-md-12 text-center ">
				<hr>
				<p  class="h3">Excluir cidade</p>
				<hr>
			</div>
		</div>
		
		<hr />
		<div role="form">
			<form class="form" method="POST" action="back/B_ExcluirCidade.php">
			<input type="hidden" id="idCidade" name="idCidade" value="<?php echo $idCidade ?>">
				<div class="form group mx-2">		

					<div class="form-row">
						<div class="col-md-5">
							<label for="idCidade" class="h6">ID</label>
						</div>
					</div>
					<div class="form-row  mb-3">
						<div class="col-md-5">
							<p><?php echo $idCidade ?></p>
						</div>
					</div>

					
					<div class="form-row">
						<div class="col-md-5">
							<label for="nome" class="h6">NOME</label>
						</div>
					</div>
					<div class="form-row  mb-3">
						<div class="col-md-5">
							<p><?php echo $nome ?></p>
						</div>
					</div>
					
					
					
					<div class="form-row">
						<div class="col-md-5">
							<label for="nome" class="h6">ESTADO</label>
						</div>
					</div>
					<div class="form-row">
						<div class="col-md-5">
							<p><?php echo $sigla ?></p>
						</div>
					</div>
					
					
					
					<hr />
					<div class="form-row">
						<div class="col-md-5">
							<input type="submit" value="EXCLUIR" class="btn btn-danger btn-lg">
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
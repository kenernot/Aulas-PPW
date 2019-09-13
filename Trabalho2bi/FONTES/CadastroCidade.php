<?php
	// Inicia sessões 
	session_start(); 
	

	
	// Verifica se existe os dados da sessão de login 
	if(!isset($_SESSION["user"]) && !isset($_SESSION["nivel"])) { 
		// Usuário não logado! Redireciona para a página de login 
		header("Location: Login.php"); 
		exit; 
	} 
	
	$erro = '-1';
	if (isset($_GET['erro'])) {
		$erro = $_GET['erro'];
	}

	//include("include/connection/config.php");
	include("factory/ConexaoFactory.php");
	
	try {
		$fac = new ConexaoFactory();
		$con = $fac->getConexao();
		$sql = "SELECT * FROM estado ORDER BY sigla ASC;";
		$result = $con->query($sql);
	} catch (Exception $e) {
		echo "ERRO: ".$e->getMessage();	
	}
?>
<!DOCTYPE HTML>
<html>

	<head>
		<?php include("include/head.php"); ?>
		<script>
			function validar() {
				var nome = document.forms["form1"]["nome"].value;
				var idEstado = document.forms["form1"]["idEstado"].value;
				var x = document.getElementById("rowerro");
				x.style.display = "block";
				
				if (nome == "") {
					document.getElementById("erro").innerHTML = "Preencha o campo nome!";
					return false;
				} else if (nome.length > 50) {
					document.getElementById("erro").innerHTML = "O campo nome pode conter no máximo 50 caracteres!";
					return false;
				} else if (idEstado.length == 0) {
					document.getElementById("erro").innerHTML = "O campo estado deve ser preenchido!";
					return false;
				} else {
					x.style.display = "none";
					return true;
				}
				
			}
		</script>
	</head>
	
	<body>
		<?php include("include/top.php"); ?>
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
					<form class="form" method="POST" onsubmit="return validar()" action="back/B_CadastroCidade.php" name="form1" id="form1">
						<div class="form group mx-2">
						
							<div class="form-row" name="rowerro" id="rowerro" <?php if ($erro == '1' or $erro == '2') { echo "style='display: block;'";} else {echo "style='display: none;'";} ?>>
								<div class="alert alert-danger" role="alert">
								  <p id="erro"><?php if ($erro == '1') { echo "Dados inválidos inseridos!";} else if ($erro == '2') { echo "Cadastro já existe!";}  ?></p>
								</div>
							</div>
							
							<div class="form-row">
								<div class="col-md-5">
									<label for="nome" class="h6">NOME</label>
								</div>
							</div>
							<div class="form-row  mb-3">
								<div class="col-md-5">
									<input type="text" name="nome" id="nome" class="form-control" onkeyup="return validar()" required maxlength="50" size="50" pattern="^[a-zA-Z\s]*$">
								</div>
							</div>
							
							
							
							<div class="form-row">
								<div class="col-md-5">
									<label for="nome" class="h6">ESTADO</label>
								</div>
							</div>
							<div class="form-row">
								<div class="col-md-5">
									<select id="idEstado" name="idEstado" class="form-control" required>
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
	</body>
<?php
	include("include/bottom.php");
?>
</html>
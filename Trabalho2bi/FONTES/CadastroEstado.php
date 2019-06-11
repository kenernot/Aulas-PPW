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
?>
<!DOCTYPE HTML>
<html>

	<head>
		<?php include("include/head.php"); ?>
		<script>
			function validar() {
				var nome = document.forms["form1"]["nome"].value;
				var sigla = document.forms["form1"]["sigla"].value;
				var x = document.getElementById("rowerro");
				x.style.display = "block";
				
				if (nome == "") {
					document.getElementById("erro").innerHTML = "Preencha o campo nome!";
					return false;
				} else if (nome.length > 50) {
					document.getElementById("erro").innerHTML = "O campo nome pode conter no máximo 50 caracteres!";
					return false;
				} else if (sigla.length != 2) {
					document.getElementById("erro").innerHTML = "O campo sigla tem que conter 2 caracteres [AA]!";
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
						<p  class="h3">Cadastro de Estado</p>
						<hr>
					</div>
				</div>
				
				<hr />
				<div role="form">
					<form onsubmit="return validar()" class="form" method="POST" action="back/B_CadastroEstado.php" name="form1" id="form1" >
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
									<input type="text" name="nome" id="nome" class="form-control" onkeyup="validar()"  required size="50" maxlength="50" pattern="^[a-zA-Z\ ]*$">
								</div>
							</div>
							
							
							
							<div class="form-row">
								<div class="col-md-5">
									<label for="sigla" class="h6">SIGLA</label>
								</div>
							</div>
							<div class="form-row  mb-3">
								<div class="col-md-5">
									<input type="text" name="sigla" id="sigla" class="form-control" onkeyup="validar()"  required size="2" maxlength="2"  pattern="^[a-zA-Z]{2}$">
								</div>
							</div>
							
							
							
							<hr />
							<div class="form-row">
								<div class="col-md-5">
									<input type="submit" value="SALVAR" class="btn btn-success btn-lg">
									<a href="Estado.php" class="btn btn-outline-info">VOLTAR</a>
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
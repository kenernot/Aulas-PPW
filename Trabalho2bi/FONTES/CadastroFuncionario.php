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
				var rg = document.forms["form1"]["rg"].value;
				var matricula = document.forms["form1"]["matricula"].value;
				var departamento = document.forms["form1"]["departamento"].value;
				var x = document.getElementById("rowerro");
				x.style.display = "block";
				
				if (nome == "") {
					document.getElementById("erro").innerHTML = "Preencha o campo nome!";
					return false;
				} else if (nome.length > 70) {
					document.getElementById("erro").innerHTML = "O campo nome pode conter no máximo 70 caracteres!";
					return false;
				} else if (rg.length == 0) {
					document.getElementById("erro").innerHTML = "Digite o RG!";
					return false;
				} else if (rg.length > 20) {
					document.getElementById("erro").innerHTML = "O campo RG pode conter no máximo 20 caracteres!";
					return false;
				} else if (matricula.length > 70) {
					document.getElementById("erro").innerHTML = "O campo matricula pode conter no máximo 70 caracteres!";
					return false;
				} else if (matricula.length = 0) {
					document.getElementById("erro").innerHTML = "O campo matricula é obrigatório!";
					return false;
				} else if (departamento.length > 45) {
					document.getElementById("erro").innerHTML = "O campo departamento pode conter no máximo 45 caracteres!";
					return false;
				} else if (departamento.length = 0) {
					document.getElementById("erro").innerHTML = "O campo departamento é obrigatório!";
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
						<p  class="h3">Cadastro de Funcionário</p>
						<hr>
					</div>
				</div>
				
				<hr />
				<div role="form">
					<form class="form" onsubmit="return validar()" method="POST" action="back/B_CadastroFuncionario.php" name="form1" id="form1" >
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
									<input type="text" name="nome" id="nome" class="form-control" onkeyup="validar()" required size="70" maxlength="70" pattern="^[a-zA-Z\s]*$">
								</div>
							</div>
							
							
							
							<div class="form-row">
								<div class="col-md-5">
									<label for="rg" class="h6">RG</label>
								</div>
							</div>
							<div class="form-row  mb-3">
								<div class="col-md-5">
									<input type="text" name="rg" id="rg" onkeyup="validar()" class="form-control" required size="20" maxlength="20">
								</div>
							</div>
							
							
							
							<div class="form-row">
								<div class="col-md-5">
									<label for="matricula" class="h6">MATRICULA</label>
								</div>
							</div>
							<div class="form-row  mb-3">
								<div class="col-md-5">
									<input type="text" name="matricula" id="matricula" onkeyup="validar()" class="form-control" required size="70" maxlength="70">
								</div>
							</div>							
							
							
							
							
							<div class="form-row">
								<div class="col-md-5">
									<label for="departamento" class="h6">DEPARTAMENTO</label>
								</div>
							</div>
							<div class="form-row  mb-3">
								<div class="col-md-5">
									<input type="text" name="departamento" id="departamento" onkeyup="validar()" class="form-control" required size="45" maxlength="45">
								</div>
							</div>	

							
							
							<hr />
							<div class="form-row">
								<div class="col-md-5">
									<input type="submit" value="SALVAR" class="btn btn-success btn-lg">
									<a href="Funcionario.php" class="btn btn-outline-info">VOLTAR</a>
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
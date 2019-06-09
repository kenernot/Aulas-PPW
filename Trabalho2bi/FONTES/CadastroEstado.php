<?php
	// Inicia sessões 
	session_start(); 
	

	
	// Verifica se existe os dados da sessão de login 
	if(!isset($_SESSION["user"]) && !isset($_SESSION["nivel"])) { 
		// Usuário não logado! Redireciona para a página de login 
		header("Location: Login.php"); 
		exit; 
	} 
?>
<!DOCTYPE HTML>
<html>

	<head>
		<?php include("include/head.php"); ?>
		<!--<script src="js/estado.js"></script>-->
		<script type="text/javascript" src="https://www.google.com/jsapi"></script>
			<script type="text/javascript">
				google.load("jquery", "1.4.2");
			</script>
		</script>
		<script>
			function validar() {
				var nome = document.forms["form1"]["nome"].value;
				var sigla = document.forms["form1"]["sigla"].value;
				var x = document.getElementById("rowerro");
				x.style.display = "block";
				
				//Não funcionando vvv
				var $text = 'back/VerificaEstadoDuplicado.php?nome='+$('#nome').val()+'&sigla='+$('#sigla').val();
				var $duplicated = '-1';
				
				var status = $.getJSON($text, function(data){	
					if (data[0].duplicado == '1') {
						$duplicated = '1';
					} else {
						$duplicated = '0';
					}
				});
				//^^ 
				
				//alert($duplicated);
				//status.done(function () {
				//	alert($duplicated);
				//)};
					if (nome == "") {
						document.getElementById("erro").innerHTML = "Preencha o campo nome!";
						return false;
					} else if (nome.length > 50) {
						document.getElementById("erro").innerHTML = "O campo nome pode conter no máximo 50 caracteres!";
						return false;
					} else if (sigla.length != 2) {
						document.getElementById("erro").innerHTML = "O campo sigla tem que conter 2 caracteres [AA]!";
						return false;
					} else if ($duplicated == '1') {
						document.getElementById("erro").innerHTML = "Cadastro duplicado!";
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
						
							<div class="form-row" name="rowerro" id="rowerro" style="display: none;">
								<div class="alert alert-danger" role="alert">
								  <p id="erro">Teste</p>
								</div>
							</div>
						
							<div class="form-row">
								<div class="col-md-5">
									<label for="nome" class="h6">NOME</label>
								</div>
							</div>
							<div class="form-row  mb-3">
								<div class="col-md-5">
									<input type="text" name="nome" id="nome" class="form-control" onkeyup="validar()"  required size="50" maxlength="50" pattern="^[a-zA-Z]*$">
								</div>
							</div>
							
							
							
							<div class="form-row">
								<div class="col-md-5">
									<label for="sigla" class="h6">SIGLA</label>
								</div>
							</div>
							<div class="form-row  mb-3">
								<div class="col-md-5">
									<input type="text" name="sigla" id="sigla" class="form-control" onkeyup="validar()"  required size="2" maxlength="2"  pattern="^[a-zA-Z].$">
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
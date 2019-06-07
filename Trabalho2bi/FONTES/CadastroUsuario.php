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
?>

<div class="d-flex justify-content-center">
	<div class="form-group shadow col-md-6">

		<div class="form-row mt-4">
			<div class="col-md-12 text-center ">
				<hr>
				<p  class="h3">Cadastro de Usuario</p>
				<hr>
			</div>
		</div>
		
		<hr />
		<div role="form">
			<form class="form" method="POST" action="back/B_CadastroUsuario.php">
				<div class="form group mx-2">
				
				
					<div class="form-row">
						<div class="col-md-5">
							<label for="user" class="h6">LOGIN</label>
						</div>
					</div>
					<div class="form-row  mb-3">
						<div class="col-md-5">
							<input type="text" name="user" id="user" class="form-control" required size="50" maxlength="50" pattern="^[a-zA-Z]*$">
						</div>
					</div>
					
					
					
					<div class="form-row">
						<div class="col-md-5">
							<label for="senha" class="h6">SENHA</label>
						</div>
					</div>
					<div class="form-row  mb-3">
						<div class="col-md-5">
							<input type="password" name="senha" id="senha" class="form-control" required size="100" maxlength="100">
						</div>
					</div>
					
					
					
					<div class="form-row">
						<div class="col-md-5">
							<label for="nivel" class="h6">NIVEL</label>
						</div>
					</div>
					<div class="form-row  mb-3">
						<div class="col-md-5">
							<select id="nivel" name="nivel" class="form-control">
								<?php
									for ($i = 0; $i< 10; $i++) {
										echo "<option value='$i'>$i</option>";
									}
								?>
							</select>
						</div>
					</div>
					
					
					
					<hr />
					<div class="form-row">
						<div class="col-md-5">
							<input type="submit" value="SALVAR" class="btn btn-success btn-lg">
							<a href="Usuario.php" class="btn btn-outline-info">VOLTAR</a>
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
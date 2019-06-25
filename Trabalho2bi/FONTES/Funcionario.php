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
	$sql = "SELECT idFuncionario, nome, rg, matricula, departamento FROM funcionario ORDER BY nome ASC LIMIT 100;";
	if (ISSET($_GET["Pesquisa"])) { 
		$sql = "SELECT idFuncionario, nome, rg, matricula, departamento FROM funcionario WHERE nome like '%".$_GET["Pesquisa"]."%' ORDER BY nome ASC LIMIT 100;";
	}
	$result = $con->query($sql);
?>

<div class="d-flex justify-content-center">
	<div class="form-group shadow col-md-7">

		<div class="form-row mt-4">
			<div class="col-md-12 text-center ">
				<hr>
				<p class="h3">Index de Funcionário</p>
				<hr>
			</div>
		</div>
		<hr />

		<div class="row	">
			<div class="col-2">
				<div class="btn-group btn-block">
					<a href="CadastroFuncionario.php" class="btn btn-success">Novo</a>
				</div>
			</div>
			<div class="col-md-10">
				<form action="Funcionario.php" method="GET">
					<div class="input-group">
						<div class="col-4 offset-6">
							<input type="text" name="Pesquisa" id="Pesquisa" class="form-control ">
						</div>
						<div class="col-2 btn-group btn-block">
							<input type="submit" value="Pesquisar" class="btn btn-outline-dark">
						</div>
					</div>
				</form>
			</div>
		</div>

		<hr />
		<div id="divListaFuncionario" class="">

			<table class="table table-responsive-sm table-striped table-hover table-bordered">
				<tr class="text-center">
					<th>
						NOME
					</th>
					<th>
						RG
					</th>
					<th>
						MATRICULA
					</th>
					<th>
						DEPARTAMENTO
					</th>
					<th>CONTROLES</th>
				</tr>

				<?php
					while ($row = $result-> fetch(PDO::FETCH_OBJ)) {
						echo	"<tr>";
						echo	"<td>";
						echo		$row->nome;
						echo	"</td>";
						echo	"<td>";
						echo		$row->rg;
						echo	"</td>";
						echo	"<td>";
						echo		$row->matricula;
						echo	"</td>";
						echo	"<td>";
						echo		$row->departamento;
						echo	"</td>";
						echo	"<td>";
						echo		"<div class='btn-group btn-block'>";
						echo			"<a href='EditarFuncionario?id=".$row->idFuncionario."' class='btn btn-primary'>Editar</a> ";
						echo			"<a href='ExcluirFuncionario?id=".$row->idFuncionario."' class='btn btn-danger'>Excluir</a> ";
						echo		"</div>";
						echo	"</td>";
						echo	"</tr>";
					}
				?>

			</table>

		</div>
		
	</div>
</div>

<?php
	include("include/bottom.php");
?>
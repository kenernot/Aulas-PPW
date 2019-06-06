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

	$result = $con->query("SELECT c.idCidade, c.nome, e.sigla FROM cidade c INNER JOIN estado e ON e.idEstado = c.idEstado ORDER BY c.nome LIMIT 100;");
?>

<div class="d-flex justify-content-center">
	<div class="form-group shadow col-md-7">

		<div class="form-row mt-4">
			<div class="col-md-12 text-center ">
				<hr>
				<p>Index de Cidade</p>
				<hr>
			</div>
		</div>
		
		<div id="divListaUsuario" class="">

			<table class="table table-responsive-sm table-striped table-hover table-bordered">
				<tr class="text-center">
					<th>
						ID
					</th>
					<th>
						NOME
					</th>
					<th>
						ESTADO
					</th>
					<th>CONTROLES</th>
				</tr>

				<?php
					while ($row = $result-> fetch(PDO::FETCH_OBJ)) {
						echo	"<tr>";
						echo	"<td>";
						echo		$row->idCidade;
						echo	"</td>";
						echo	"<td>";
						echo		$row->nome;
						echo	"</td>";
						echo	"<td>";
						echo		$row->sigla;
						echo	"</td>";
						echo	"<td>";
						echo		"<div class='btn-group btn-block'>";
						echo			"<a href='EditarCidade?id=".$row->idCidade."' class='btn btn-primary'>Editar</a> ";
						echo			"<a href='ExcluirCidade?id=".$row->idCidade."' class='btn btn-danger'>Excluir</a> ";
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
<?php
	// Inicia sessões 
	session_start(); 
	 
	// Verifica se existe os dados da sessão de login 
	if(!isset($_SESSION["usuario"]) && !isset($_SESSION["nivel"])) { 
		// Usuário não logado! Redireciona para a página de login 
		header("Location: F_Login.php"); 
		exit; 
	} 
	include('includes/conecta.inc.php');

	$sql_tipo = "select * from tipomidia;";
	$query_tipo = mysql_query($sql_tipo,$conexao);
	
	$sql_classificacao = "select * from midiaclassificacao;";
	$query_classificacao = mysql_query($sql_classificacao,$conexao);
	
	$sql_genero = "select * from midiagenero;";
	$query_genero = mysql_query($sql_genero,$conexao);	
	$super = false;
	if ($_SESSION["nivel"] == 99) {
		$super = true;
	}
	echo $super

 ?>
 		
<html>
	<head>
		<meta charset="UTF-8">
		<meta lang="pt-br">
		<link rel="stylesheet" type="text/css" href="CSS/myCSS.css"/>
	</head>
	
	<body>

		<form name="form1" action="B_CadMidia.php" method="post">
			<div class="centro2 claro">
				<div class="conteudo">
					<input type="button" value="VOLTAR" onclick="window.location = 'http://127.0.0.1/Aulas-PPW/Tela%20Login/';" name="back" class="submitButton">
					
					<table align="center" border="1" class="loginTable" style="margin-top: 10px;"> 
						<tr class="loginTable_tr">
							<td class="labelCadastro"><label for="pesquisa">Pesquisa: </td>
							<td class="tdCadastro" colspan='1'><input type="text" name="pesquisa" ID="pesquisa"  class="editCadastro" style='width:100%;'></td>
						</tr>
						<tr class="loginTable_tr">
							<td class="tdCadastro" colspan="4">
								<select class='comboCadastro' name="lista" id="lista" style='min-width: 90px; width: 100%;' size="6">
								</select>
							</td>
						</tr>
					</table>
					
					<hr>
					<table align="center" border="0" class="loginTable"> 
						<tr class="loginTable_tr">
							<td class="labelCadastro"><label for="titulo">Título</td>
							<td class="tdCadastro" colspan='4'><input type="text" <?php if (!$super) {echo "disabled";} ?> required name="titulo" ID="titulo"  class="editCadastro" style='width:100%;'></td>
						</tr>
						<tr class="loginTable_tr">
							<td class="labelCadastro"><label for="tipo">Tipo:</td>
							<td class="tdCadastro" width='200'>
								<?php 
									if (!$super) {
										echo "<input type='text' name='tipo' ID='tipo' disabled class='editCadastro' style='width:100%;' >";
									} else {
										echo "<select class='comboCadastro' name='idtipo' id='idtipo'>";
										while ($row = mysql_fetch_array($query_tipo, MYSQL_NUM)) {
											echo '<option value='.$row[0].'>'.$row[1].'</option>';
										}
										echo "</select>";
									}
								?>
								
							</td>
							<td class="labelCadastro"><label for="classificacao">Classificação:</td>
							<td class="tdCadastro">
								<?php 
									if (!$super) {
										echo "<input type='text' disabled required name='classificacao' ID='classificacao'  class='editCadastro' style='width:100%;'>";
									} else {
										echo "<select class='comboCadastro' name='idclassificacao' id='idclassificacao' style='min-width: 90px;'>";
                                        while ($row = mysql_fetch_array($query_classificacao, MYSQL_NUM)) {
											echo '<option value='.$row[0].'>'.$row[1].'</option>';
										}
										echo "</select>";
									}
								?>
							
								
							</td>
						</tr>
						<tr class="loginTable_tr">
							<td class="labelCadastro"><label for="temporadas">Temporadas:</td>
							<td class="tdCadastro"><input type="text" <?php if (!$super) {echo "disabled";} ?> name="qtdTemporadas" ID="qtdTemporadas" <?php if (!$super) {echo "disabled";} ?> class="editCadastro" style='width:100%;'></td>
							<td class="labelCadastro"><label for="episodios">Episódios:</td>
							<td class="tdCadastro"><input type="text" <?php if (!$super) {echo "disabled";} ?> name="qtdEpisodios" ID="qtdEpisodios"  class="editCadastro" style='width:100%;'></td>
						</tr>
						<tr class="loginTable_tr">
							<td class="labelCadastro"><label for="duracao">Duração:</td>
							<td class="tdCadastro"><input type="text" <?php if (!$super) {echo "disabled";} ?> name="duracao" ID="duracao" class="editCadastro" style='width:100%;'></td>
							<td class="labelCadastro"><label for="datalancamento">Lançamento:</td>
							<td class="tdCadastro"><input type="date" <?php if (!$super) {echo "disabled";} ?> name="dataLancamento" ID="dataLancamento" class="editCadastro" style='width:100%;'></td>
						</tr>
						<tr class="loginTable_tr">
							<td class="labelCadastro"><label for="nacionalidade">Nacionalidade:</td>
							<td class="tdCadastro"><input type="text" <?php if (!$super) {echo "disabled";} ?> name="nacionalidade" ID="nacionalidade" class="editCadastro" style='width:100%;'></td>
						</tr>
						<tr class="loginTable_tr">
							<td class="labelCadastro" colspan='0' style='text-align:center;'><label for="generosmidia">Gêneros da mídia:</td>
							<td class="labelCadastro" colspan='2' style='text-align:center;'><input type="text" <?php if (!$super) {echo "disabled";} ?> name="generosmidia" ID="generosmidia" <?php if (!$super) {echo "disabled";} ?> class="editCadastro" style='width:100%;'></td>
							<td class="labelCadastro" colspan='2' style='text-align:center;'></td>
						</tr>
						
						<tr class="loginTable_tr">
							<td class="labelCadastro" colspan='4' style='text-align:center;'><label for="elenco">Elenco:</td>
						</tr>
						<tr>
							<td class="tdCadastro" colspan='4'>
								<textarea  <?php if (!$super) {echo "disabled";} ?> rows="6" cols="50" name="elenco" ID="elenco" class="editCadastro" style='width:100%;'></textarea>
							</td>
						</tr>
						
						<tr class="loginTable_tr">
							<td class="labelCadastro" colspan='4' style='text-align:center;'><label for="sinopse">Sinopse:</td>
						</tr>
						<tr>
							<td class="tdCadastro" colspan='4'>
								<textarea  <?php if (!$super) {echo "disabled";} ?> rows="8" cols="50" name="sinopse" ID="sinopse" class="editCadastro" style='width:100%;'></textarea>
							</td>
						</tr>


						
					</table>
					
				</div>
			</div>
		</form>
		<script type="text/javascript" src="https://www.google.com/jsapi"></script>
			<script type="text/javascript">
				google.load("jquery", "1.4.2");
		</script>
		<script type="text/javascript">
		$(function(){
				$('#lista').click(function(){
					$.getJSON('B_VerMidia_Mostrar.php?search=',{lista: $('#lista').val()}, function(data){	
						$('#titulo').val(data[0].titulo);
						$('#classificacao').val(data[0].classificacao);
						
						$('#tipo').val(data[0].tipo);
						$('#idtipo').val(data[0].idtipo);
						$('#idclassificacao').val(data[0].idclassificacao);
						$('#duracao').val(data[0].duracao);
						$('#elenco').val(data[0].elenco);
						$('#sinopse').val(data[0].sinopse);
						$('#nacionalidade').val(data[0].nacionalidade);
						$('#dataLancamento').val(data[0].dataLancamento);
						$('#qtdEpisodios').val(data[0].qtdEpisodios);
						$('#qtdTemporadas').val(data[0].qtdTemporadas);
						$('#generosmidia').val(data[0].generosmidia);
					});
				});
			});
		</script>				
		<script type="text/javascript">
			$(function(){
				$('#pesquisa').keyup(function(){
					if( $(this).val() ) {
						$.getJSON('B_VerMidia_Lista.php?search=',{pesquisa: $(this).val(), ajax: 'true'}, function(j){
							var options;
							for (var i = 0; i < j.length; i++) {
								options += '<option value="' + j[i].idmidia + '">' + j[i].titulo + '</option>';
							}	
							$('#lista').html(options).show();
							
						});
					} else {
						$('#lista').html('');
					}
				});
			});

		</script>		

	</body>
</html>
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

 ?>
 		 <script language="JavaScript">
			function move(MenuOrigem, MenuDestino){
				var arrMenuOrigem = new Array();
				var arrMenuDestino = new Array();
				var arrLookup = new Array();
				var i;
				for (i = 0; i < MenuDestino.options.length; i++){
					arrLookup[MenuDestino.options[i].text] = MenuDestino.options[i].value;
					arrMenuDestino[i] = MenuDestino.options[i].text;
				}
				var fLength = 0;
				var tLength = arrMenuDestino.length;
				for(i = 0; i < MenuOrigem.options.length; i++){
					arrLookup[MenuOrigem.options[i].text] = MenuOrigem.options[i].value;
					if (MenuOrigem.options[i].selected && MenuOrigem.options[i].value != ""){
						arrMenuDestino[tLength] = MenuOrigem.options[i].text;
						tLength++;
					}
					else{
						arrMenuOrigem[fLength] = MenuOrigem.options[i].text;
						fLength++;
					}
				}
				arrMenuOrigem.sort();
				arrMenuDestino.sort();
				MenuOrigem.length = 0;
				MenuDestino.length = 0;
				var c;
				for(c = 0; c < arrMenuOrigem.length; c++){
					var no = new Option();
					no.value = arrLookup[arrMenuOrigem[c]];
					no.text = arrMenuOrigem[c];
					MenuOrigem[c] = no;
				}
				for(c = 0; c < arrMenuDestino.length; c++){
					var no = new Option();
					no.value = arrLookup[arrMenuDestino[c]];
					no.text = arrMenuDestino[c];
					MenuDestino[c] = no;
			   }
			}
			function selectAll(box) {
				for(var i=0; i<box.length; i++) {
					box.options[i].selected = true;
				}
			}
		</script>
<html>
	<head>
		<meta charset="UTF-8">
		<meta lang="pt-br">
		<link rel="stylesheet" type="text/css" href="CSS/myCSS.css"/>
	</head>
	
	<body>

		<form name="form1" action="B_VerMidia.php" method="post">
		<input type="text" hidden name="idmidia" id="idmidia">
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
						<?php
							if (!$super) {
								echo	"<td class='labelCadastro' colspan='0' style='text-align:center;'><label for='generosmidia'>Gêneros da mídia:</td>";
								echo	"<td class='labelCadastro' colspan='2' style='text-align:center;'><input type='text' disabled name='generosmidia' ID='generosmidia' class='editCadastro' style='width:100%;'></td>";
								echo	"<td class='labelCadastro' colspan='2' style='text-align:center;'></td>";
							} else {
								echo	"<tr class='loginTable_tr'>";
								echo		"<td class='labelCadastro' colspan='0' style='text-align:center;'><label for='elenco'>Gêneros disponíveis:</td>";
								echo		"<td class='labelCadastro' colspan='2' style='text-align:center;'></td>";
								echo		"<td class='labelCadastro' colspan='0' style='text-align:center;'><label for='elenco'>Gêneros da mídia:</td>";
								echo	"</tr>";
								echo	"<tr>";
								echo	"<td class='tdCadastro'>";
								echo		"<select class='comboCadastro' multiple name='generosdisponiveis' id='generosdisponiveis' style='min-width: 90px;'  size='6'>";
								echo		"</select>";
								echo	"</td>";
								echo	"<td class='tdCadastro' colspan=2>";
								echo		"<input type='button' onClick='move(this.form.generosdisponiveis,this.form.generosmidia)' value='>>' class='submitButton' style='width:100%; height: 50%;'>";
								echo		"<input type='button' onClick='move(this.form.generosmidia,this.form.generosdisponiveis)' value='<<' class='submitButton' style='width:100%; height: 100%;'>";
								echo	"</td>";
								echo	"<td class='tdCadastro'>";
								echo		"<select class='comboCadastro' required multiple name='generosmidia[]' id='generosmidia' style='min-width: 90px; width: 100%;' size='6'>";
								echo		"</select>";
								echo	"</td>";
								echo "</tr>";

							}
						?>
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


						<?php if ($super) {echo "<tr><td colspan='4'  align='center' class='myLabel'><input onClick='selectAll(this.form.generosmidia);' type='submit' value='ATUALIZAR' name='submit' class='submitButton'></td></tr>";} ?>
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
						$('#idmidia').val(data[0].idmidia);
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
						$('#generosmidia').val(data[0].generos);
						
					});
					$.getJSON('B_VerMidia_GDisponiveis.php?search=',{pesquisa: $(this).val(), ajax: 'true'}, function(j){
						var options;
						for (var i = 0; i < j.length; i++) {
							options += '<option value="' + j[i].idMidiaGenero + '">' + j[i].nome + '</option>';
						}	
						$('#generosdisponiveis').html(options).show();
					});		
					$.getJSON('B_VerMidia_GMidia.php?search=',{pesquisa: $(this).val(), ajax: 'true'}, function(j){
						var options;
						for (var i = 0; i < j.length; i++) {
							options += '<option value="' + j[i].idGenero + '">' + j[i].nome + '</option>';
						}	
						$('#generosmidia').html(options).show();
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
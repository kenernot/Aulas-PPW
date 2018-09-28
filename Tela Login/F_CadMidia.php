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
		<form name="form1" action="B_CadMidia.php" method="post">
			<div class="centro2 claro">
				<div class="conteudo">
					<table align="center" border="0" class="loginTable"> 
						<tr class="loginTable_tr">
							<td class="labelCadastro"><label for="titulo">Título</td>
							<td class="tdCadastro" colspan='4'><input type="text" name="titulo" ID="titulo"  class="editCadastro" style='width:100%;'></td>
						</tr>
						<tr class="loginTable_tr">
							<td class="labelCadastro"><label for="tipo">Tipo:</td>
							<td class="tdCadastro" width='200'>
							    <select class='comboCadastro' name='tipo' id='tipo'>
									<?php
                                        while ($row = mysql_fetch_array($query_tipo, MYSQL_NUM)) {
											echo '<option value='.$row[0].'>'.$row[1].'</option>';
										}
									?>
                                </select>
							</td>
							<td class="labelCadastro"><label for="classificacao">Classificação:</td>
							<td class="tdCadastro">
							    <select class='comboCadastro' name='classificacao' id='classificacao' style='min-width: 90px;'>
									<?php
                                        while ($row = mysql_fetch_array($query_classificacao, MYSQL_NUM)) {
											echo '<option value='.$row[0].'>'.$row[1].'</option>';
										}
									?>
                                </select>
							</td>
						</tr>
						<tr class="loginTable_tr">
							<td class="labelCadastro"><label for="temporadas">Temporadas:</td>
							<td class="tdCadastro"><input type="text" name="temporadas" ID="temporadas"  class="editCadastro" style='width:100%;'></td>
							<td class="labelCadastro"><label for="episodios">Episódios:</td>
							<td class="tdCadastro"><input type="text" name="episodios" ID="episodios"  class="editCadastro" style='width:100%;'></td>
						</tr>
						<tr class="loginTable_tr">
							<td class="labelCadastro"><label for="duracao">Duração:</td>
							<td class="tdCadastro"><input type="text" name="duracao" ID="duracao" class="editCadastro" style='width:100%;'></td>
							<td class="labelCadastro"><label for="datalancamento">Lançamento:</td>
							<td class="tdCadastro"><input type="text" name="datalancamento" ID="datalancamento" class="editCadastro" style='width:100%;'></td>
						</tr>
						<tr class="loginTable_tr">
							<td class="labelCadastro"><label for="nacionalidade">Nacionalidade:</td>
							<td class="tdCadastro"><input type="text" name="nacionalidade" ID="nacionalidade" class="editCadastro" style='width:100%;'></td>
						</tr>
						<tr class="loginTable_tr">
							<td class="labelCadastro" colspan='0' style='text-align:center;'><label for="elenco">Gêneros disponíveis:</td>
							<td class="labelCadastro" colspan='2' style='text-align:center;'></td>
							<td class="labelCadastro" colspan='0' style='text-align:center;'><label for="elenco">Gêneros da mídia:</td>
						</tr>
						<tr>
							<td class="tdCadastro">
								<select class='comboCadastro' multiple name='generosdisponiveis' id='generosdisponiveis' style='min-width: 90px;'  size="6">
									<?php
										while ($row = mysql_fetch_array($query_genero , MYSQL_NUM)) {
											echo '<option value='.$row[0].'>'.$row[1].'</option>';
										}
									?>
								</select>
							</td>
							
							<td class="tdCadastro" colspan=2>
								<input type="button" onClick="move(this.form.generosdisponiveis,this.form.generosmidia)" value=">>" class="submitButton" style='width:100%; height: 50%;'>
								<input type="button" onClick="move(this.form.generosmidia,this.form.generosdisponiveis)" value="<<" class="submitButton" style='width:100%; height: 100%;'>
							</td>
							
							
							<td class="tdCadastro">
								<select class='comboCadastro' multiple name="generosmidia[]" id="generosmidia" style='min-width: 90px; width: 100%;' size="6">
								</select>
							</td>
						</tr>
						
						<tr class="loginTable_tr">
							<td class="labelCadastro" colspan='4' style='text-align:center;'><label for="elenco">Elenco:</td>
						</tr>
						<tr>
							<td class="tdCadastro" colspan='4'>
								<textarea rows="6" cols="50" name="elenco" ID="elenco" class="editCadastro" style='width:100%;'></textarea>
							</td>
						</tr>
						
						<tr class="loginTable_tr">
							<td class="labelCadastro" colspan='4' style='text-align:center;'><label for="sinopse">Sinopse:</td>
						</tr>
						<tr>
							<td class="tdCadastro" colspan='4'>
								<textarea rows="8" cols="50" name="sinopse" ID="sinopse" class="editCadastro" style='width:100%;'></textarea>
							</td>
						</tr>

						
						<tr>
							<td colspan="4"  align="center" class="myLabel"><input onClick="selectAll(this.form.generosmidia);" type="submit" value="CADASTRAR" name="submit" class="submitButton"></td>
						</tr>

						
					</table>
				</div>
			</div>
		</form>
	</body>
</html>
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

	$sql_tipo = "select * from usuario;";
	$query_tipo = mysql_query($sql_tipo,$conexao);	
 ?>

<html>
	<head>
		<meta charset="UTF-8">
		<meta lang="pt-br">
		<link rel="stylesheet" type="text/css" href="CSS/myCSS.css"/>
	</head>
	
	<body>
		<form name="form1" action="B_Permissao.php" method="post">
			<div class="centro2 claro">
				<div class="conteudo">
					<input type="button" value="VOLTAR" onclick="window.location = 'http://127.0.0.1/aulas/Aulas-PPW/Tela%20Login/';" name="back" class="submitButton">
					<table align="center" border="0" class="loginTable"> 
						<tr class="loginTable_tr">
							<td class="labelCadastro"><label for="usuario">Usuario:</td>
							<td class="tdCadastro" width='200'>
							    <select class='comboCadastro' name='usuario' id='usuario'>
									<?php
                                        while ($row = mysql_fetch_array($query_tipo, MYSQL_NUM)) {
											echo '<option value='.$row[0].'>'.$row[1].'</option>';
										}
									?>
                                </select>
							</td>
						</tr>
						<tr class="loginTable_tr">
							<td class="labelCadastro"><label for="nivel">Nível:</td>
							<td class="tdCadastro">
							    <select class='comboCadastro' name='nivel' id='nivel'>
									<option value="0">0</option>
									<option value="99">99</option>
                                </select>
							</td>
						</tr>						


						
						<tr>
							<td colspan="4"  align="center" class="myLabel"><input type="submit" value="ALTERAR PERMISSAO" name="submit" class="submitButton"></td>
						</tr>

						
					</table>
				</div>
			</div>
		</form>
	</body>
</html>
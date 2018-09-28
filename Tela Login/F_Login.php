<?php
	// Inicia sessões 
	session_start(); 
	 
	// Verifica se existe os dados da sessão de login 
	if(isset($_SESSION["usuario"]) && isset($_SESSION["nivel"])) { 
		// Usuário não logado! Redireciona para a página de login 
		header("Location: index.php"); 
		exit; 
	} 

?>

<script language="JavaScript">
	function goCad() {
		location.href = "F_Cadusu.php";
	}
</script>

<html>
	<head>
		<meta charset="UTF-8">
		<meta lang="pt-br">
		<link rel="stylesheet" type="text/css" href="CSS/myCSS.css"/>
	</head>
	
	<body>
		<form name="form1" action="B_Login.php" method="post">
			<div class="centro2 escuro">
				<div class="conteudo">
				<img src="Imagens/Usuario.png" class="loginImg">
					<table align="center" border="0" class="loginTable"> 
						<tr class="loginTable_tr">
							<td class="myLabel"><label for="usuario">Usuário</td>
						</tr>
						<tr>
							<td class="myEditLabel"><img src="Imagens/user.png" class="imgUSERPASS"><input type="text" name="usuario" ID="usuario"  class="myUser"></td>
						</tr>
						<tr>
							<td class="myLabel"><label for="senha">Senha</label></td>
						</tr>
						<tr>
							<td class="myEditLabel"><img src="Imagens/lock.png" class="imgUSERPASS"><input type="password" name="senha" id="senha" class="myUser"></td>
						</tr>
						<tr>
							<td colspan="4" align="center" class="myLabel"><input type="submit" value="LOGIN" name="submit" class="submitButton"></td>
						</tr>
						<tr>
							<td colspan="4" align="center" class="myLabel"><input type="button" value="CADASTRO" name="cadastro" class="submitButton" onClick="goCad()"></td>
						</tr>
					</table>
				</div>
			</div>
		</form>
	</body>
</html>
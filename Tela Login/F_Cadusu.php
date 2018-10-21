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


<html>
	<head>
		<meta charset="UTF-8">
		<meta lang="pt-br">
		<link rel="stylesheet" type="text/css" href="CSS/myCSS.css"/>
	</head>
	
	<body>
		<form name="usuario" action="B_Cadusu.php" method="post">
			<div class="centro2 escuro">
				<div class="conteudo">
				<input type="button" value="VOLTAR" onclick="window.location = 'http://127.0.0.1/aulas/Aulas-PPW/Tela%20Login/';" name="back" class="submitButton"><br>
				<img src="Imagens/Usuario.png" class="loginImg">
					<table align="center" border="0" class="loginTable"> 
						<tr class="loginTable_tr">
							<td class="myLabel"><label for="usuario">Usuário</td>
						</tr>
						<tr>
							<td class="myEditLabel"><img src="Imagens/user.png" class="imgUSERPASS"><input type="text" required name="usuario" ID="usuario"  class="myUser"></td>
						</tr>
						<tr>
							<td class="myLabel"><label for="senha">Senha</label></td>
						</tr>
						<tr>
							<td class="myEditLabel"><img src="Imagens/lock.png" class="imgUSERPASS"><input type="password" required name="senha" id="senha" class="myUser"></td>
						</tr>						
						<tr>	
							<td class="myLabel"><label for="confirmarsenha">Confirmar Senha</label></td>
						</tr>
						<tr>
							<td class="myEditLabel"><img src="Imagens/lock.png" class="imgUSERPASS"><input type="password" required name="confirmarsenha" id="confirmarsenha" class="myUser"></td>
						</tr>
						<tr>
							<td class="myLabel"><label for="email">Email</label></td>
						</tr>
						<tr>
							<td class="myEditLabel"><img src="Imagens/email.png" class="imgUSERPASS"><input type="text" required name="email" id="email" class="myUser"></td>
						</tr>
						<tr>
							<td class="myLabel"><label for="confirmaremail">Confirmar Email</label></td>
						</tr>
						<tr>
							<td class="myEditLabel"><img src="Imagens/email.png" class="imgUSERPASS"><input type="text" required name="confirmaremail" id="confirmaremail" class="myUser"></td>
						</tr>						
						<tr>
							<td colspan="4" align="center" class="myLabel"><input type="submit" value="CADASTRAR" name="submit" class="submitButton"></td>
						</tr>
					</table>
				</div>
			</div>
		</form>
	</body>
</html>

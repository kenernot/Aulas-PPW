<?php
	// Inicia sessões 
	session_start(); 

?>

<script language="JavaScript">
	function Go(tela) {
		switch (tela) {
			case 'CadUsu':
				location.href = "F_Cadusu.php";
				break;
			case 'Login':
				location.href = "F_Login.php";
				break;
			case 'CadMidia':
				location.href = "F_CadMidia.php";
				break;
			case 'RelMidia':
				location.href = "F_RelMidia.php";
				break;
			case 'RelUsuario':
				location.href = "F_RelUsuario.php";
				break;
			default:
				break;
			
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
			<div class="centro2 escuro">
				<div class="conteudo">
					<table align="center" border="0" class="loginTable"> 
						<tr>
							<td colspan="4" align="center" class="myLabel"><input type="button" value="LOGIN" class="submitButton" onClick="Go('Login')"></td>
						</tr>
						<tr>
							<td colspan="4" align="center" class="myLabel"><input type="button" value="CADASTRO USUARIO" class="submitButton" onClick='Go("CadUsu")'></td>
						</tr>
						
						<?php
								if(isset($_SESSION["usuario"]) && isset($_SESSION["nivel"])) { 
									if ($_SESSION["nivel"] == '99') {
										$TXT = '"'.'CadMidia'.'"';
										echo "<tr><td colspan='4' align='center' class='myLabel'><input type='button' value='CADASTRO DE MIDIA' class='submitButton' onClick='Go($TXT)'></td></tr>";
										$TXT = '"'.'RelUsuario'.'"';
										echo "<tr><td colspan='4' align='center' class='myLabel'><input type='button' value='REL. DE USUARIO' class='submitButton' onClick='Go($TXT)'></td></tr>";
										$TXT = '"'.'RelMidia'.'"';
										echo "<tr><td colspan='4' align='center' class='myLabel'><input type='button' value='REL. DE MIDIA' class='submitButton' onClick='Go($TXT)'></td></tr>";
									}
								} 
						?>
					</table>
				</div>
			</div>
	</body>
</html>
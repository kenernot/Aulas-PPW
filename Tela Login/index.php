<?php
	// Inicia sessões 
	session_start(); 
	if(!isset($_SESSION["usuario"]) && !isset($_SESSION["nivel"])) { 
		header("Location: F_Login.php"); 
	}
?>

<script language="JavaScript">
	function Go(tela) {
		switch (tela) {
			case 'CadUsu':
				location.href = "F_Cadusu.php";
				break;
			case 'Login':
				location.href = "index.php";
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
			case 'VerMidia':
				location.href = "F_VerMidia.php";
				break;
			case 'Permissao':
				location.href = "F_Permissao.php";
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
						<form name="form1" action="B_index.php" method="post">
							<tr>
								<td colspan="4" align="center" class="myLabel"><input type="submit" value="LOGOUT" class="submitButton BGRed"></td>
							</tr>
						</form>
						
						<?php
								if(isset($_SESSION["usuario"]) && isset($_SESSION["nivel"])) { 
										$TXT = '"'.'VerMidia'.'"';
										echo "<tr><td colspan='4' align='center' class='myLabel'><input type='button' value='VISUALIZAR MIDIAS' class='submitButton' onClick='Go($TXT)'></td></tr>";
									if ($_SESSION["nivel"] == '99') {
										$TXT = '"'.'CadMidia'.'"';
										echo "<tr><td colspan='4' align='center' class='myLabel'><input type='button' value='CADASTRO DE MÍDIA' class='submitButton' onClick='Go($TXT)'></td></tr>";
										$TXT = '"'.'RelUsuario'.'"';
										echo "<tr><td colspan='4' align='center' class='myLabel'><input type='button' value='REL. DE USUÁRIO' class='submitButton BGGreen' onClick='Go($TXT)'></td></tr>";
										$TXT = '"'.'RelMidia'.'"';
										echo "<tr><td colspan='4' align='center' class='myLabel'><input type='button' value='REL. DE MÍDIA' class='submitButton BGGreen' onClick='Go($TXT)'></td></tr>";
										$TXT = '"'.'Permissao'.'"';
										echo "<tr><td colspan='4' align='center' class='myLabel'><input type='button' value='PERMISSÃO' class='submitButton' onClick='Go($TXT)'></td></tr>";
									}
								} 
						?>
					</table>
				</div>
			</div>
	</body>
</html>
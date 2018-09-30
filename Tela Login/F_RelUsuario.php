<?php
	// Inicia sessões 
	session_start(); 
	 
	if(!isset($_SESSION["usuario"]) && !isset($_SESSION["nivel"])) { 
		if ($_SESSION["nivel"] != '99') {
			header("Location: index.php"); 
			exit; 
		}
	} 

?>

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
					<input type="button" value="VOLTAR" onclick="window.location = 'http://127.0.0.1/aulas-ppw/Tela%20Login/F_Login.php';" name="back" class="submitButton">
					<table align="center" border="1" class="loginTable" style="margin-top: 20px;"> 
						<tr>
							<th class="RelTH">USUARIO</th>
							<th class="RelTH">NIVEL</th>
						</tr>
						<?php
							include('includes/conecta.inc.php');
							$ver = "SELECT usuario, nivel from USUARIO";
							$result_ver = mysql_query($ver,$conexao);
							$n_ver = mysql_num_rows($result_ver);

							if($n_ver!=0){
									while ($row = mysql_fetch_array($result_ver, MYSQL_NUM)) {
										echo "<tr>";
										echo "<td class='RelTD'>$row[0]</td><td class='RelTD'>$row[1]</td>";
										echo "</tr>";
									}
							}

						?>
					</table>
					<input type="button" value="VOLTAR" onclick="window.location = 'http://127.0.0.1/aulas-ppw/Tela%20Login/F_Login.php';" name="back" class="submitButton">
				</div>
			</div>
		</form>
	</body>
</html>
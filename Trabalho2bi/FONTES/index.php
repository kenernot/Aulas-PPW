<?php
	// Inicia sessões 
	session_start(); 
	 
	// Verifica se existe os dados da sessão de login 
	if(!isset($_SESSION["user"]) && !isset($_SESSION["nivel"])) { 
		// Usuário não logado! Redireciona para a página de login 
		header("Location: Login.php"); 
		exit; 
	} 
	if(ISSET($_POST["Erro1"])) {
		$erro = $_POST["Erro1"];
	}
?>

<html>
	<head>
	
		<?php
			include("include/head.php");
		?>
		
	</head>
	
	<body>
	
		<?php
			if (!ISSET($_POST["Erro1"])) {
				include("include/top.php");
				include("include/bottom.php");
			} else {
				echo $erro;
			}
		?>
		
	</body>
	
</html>
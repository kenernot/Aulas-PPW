<?php
	// Inicia sessões 
	session_start(); 
	 
	// Verifica se existe os dados da sessão de login 
	if(!isset($_SESSION["user"]) && !isset($_SESSION["nivel"])) { 
		// Usuário não logado! Redireciona para a página de login 
		header("Location: Login.php"); 
		exit; 
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
			include("include/top.php");
		?>
	
	
		<?php
			include("include/bottom.php");
		?>
		
	</body>
	
</html>
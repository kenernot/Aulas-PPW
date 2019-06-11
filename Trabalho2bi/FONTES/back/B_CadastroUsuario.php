<?php 
	// Recebe e arruma dados
    $user = strtolower($_POST["user"]);
	$senha = MD5($_POST["senha"]);
	$nivel = $_POST["nivel"];	
	
	//Executa processa
	
    
	$valido = true;
	if (strlen($user) > 50 or strlen($user) == 0 or strlen($_POST["senha"]) > 50 or strlen($_POST["senha"]) == 0 or !preg_match("/^[a-zA-Z]*$/",$user) or !preg_match("/^[0-9]{1}$/",$nivel)) {
		$valido = false;
		header("Location: ../CadastroUsuario.php?erro=1");
	} else if ($valido) {
		include("../include/connection/config.php"); 
		$con = new PDO($connectionString, USER,PASS);
		
		$sql = "SELECT NULL FROM usuario WHERE user='$user' LIMIT 1;";
		
		$result = $con->query($sql);
		
		if ($result->rowCount() > 0) {
			$valido = false;
			header("Location: ../CadastroUsuario.php?erro=2");
		} else {
	
			//Executa processa
			
			$sql = "INSERT INTO usuario(user, password, nivel) VALUES('$user','$senha', '$nivel');";
			  
			if($con->query($sql)){
				$msg = "Gravado com sucesso!";
			}else{
				$msg = "Erro ao gravar!";
			}
			header('Location: ../Usuario.php');
		}
	}

?>
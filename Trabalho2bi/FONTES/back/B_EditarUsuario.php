<?php 
	session_start(); 
	// Recebe e arruma dados
    $idUsuario = $_POST["idUsuario"];
	$user = strtolower($_POST["user"]);
	$senha = MD5($_POST["senha"]);
	$nivel = $_POST["nivel"];
	
	
	$valido = true;
	if (strlen($user) > 50 or strlen($user) == 0 or strlen($_POST["senha"]) > 50 or strlen($_POST["senha"]) == 0 or !preg_match("/^[a-zA-Z]*$/",$user) or !preg_match("/^[0-9]{1}$/",$nivel)) {
		$valido = false;
		header("Location: ../EditarUsuario.php?erro=1&id=$idUsuario");
	} else if ($valido) {
		include("../include/connection/config.php"); 
		$con = new PDO($connectionString, USER,PASS);
		
		$sql = "SELECT NULL FROM usuario WHERE user='$user' AND idUsuario != $idUsuario LIMIT 1;";
		
		$result = $con->query($sql);
		
		if ($result->rowCount() > 0) {
			$valido = false;
			header("Location: ../EditarUsuario.php?erro=2&id=$idUsuario");
		} else {
	
			//Executa processa
			
			$sql = "UPDATE usuario SET user = '$user', password = '$senha', nivel = '$nivel' WHERE idUsuario = $idUsuario;";

			  
			if($con->query($sql)){
				$msg = "Gravado com sucesso!";
			}else{
				$msg = "Erro ao gravar!";
			}
			
			if ($idUsuario == $_SESSION["idUsuario"]) {
				header('Location: B_Logout.php');
			} else {
				header('Location: ../Usuario.php');
			}
		}
	}
?>
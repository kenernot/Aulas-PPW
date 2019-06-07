<?php 
	session_start(); 
	// Recebe e arruma dados
    $idUsuario = $_POST["idUsuario"];
	$user = strtolower($_POST["user"]);
	$senha = MD5($_POST["senha"]);
	
	//Valida dados
	include("../include/connection/config.php"); 
	$con = new PDO($connectionString, USER,PASS);	
	
	//Executa processa
	
    $sql = "UPDATE usuario SET user = '$user', password = '$senha' WHERE idUsuario = $idUsuario;";
      
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
?>
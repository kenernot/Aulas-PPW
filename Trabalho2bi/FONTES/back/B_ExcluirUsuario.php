<?php 
	// Recebe e arruma dados
    $idUsuario = strtolower($_POST["idUsuario"]);
	
	//Valida dados
	include("../include/connection/config.php"); 
	$con = new PDO($connectionString, USER,PASS);	
	
	//Executa processa
	
    $sql = "DELETE FROM usuario WHERE idUsuario=$idUsuario;";
      
    if($con->query($sql)){
        $msg = "Gravado com sucesso!";
    }else{
        $msg = "Erro ao gravar!";
    }
	
	echo $sql;
	echo "<br>";
	echo $msg;
	
	header('Location: ../Usuario.php');
?>
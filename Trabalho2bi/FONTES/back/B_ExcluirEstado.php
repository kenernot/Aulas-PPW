<?php 
	// Recebe e arruma dados
    $idEstado = strtolower($_POST["idEstado"]);
	
	//Valida dados
	include("../include/connection/config.php"); 
	$con = new PDO($connectionString, USER,PASS);	
	
	//Executa processa
	
    $sql = "DELETE FROM estado WHERE idEstado=$idEstado;";
      
    if($con->query($sql)){
        $msg = "Gravado com sucesso!";
    }else{
        $msg = "Erro ao gravar!";
    }
	
	echo $sql;
	echo "<br>";
	echo $msg;
	
	header('Location: ../Estado.php');
?>
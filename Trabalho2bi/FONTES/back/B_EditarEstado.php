<?php 
	// Recebe e arruma dados
    $idEstado = $_POST["idEstado"];
	$nome = strtoupper($_POST["nome"]);
	$sigla = strtoupper($_POST["sigla"]);
	
	//Valida dados
	include("../include/connection/config.php"); 
	$con = new PDO($connectionString, USER,PASS);	
	
	//Executa processa
	
    $sql = "UPDATE estado SET nome = '$nome', sigla = '$sigla' WHERE idEstado = $idEstado;";
      
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
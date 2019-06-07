<?php 
	// Recebe e arruma dados
    $idCidade = $_POST["idCidade"];
	$idEstado = $_POST["idEstado"];
	$nome = strtoupper($_POST["nome"]);
	
	//Valida dados
	include("../include/connection/config.php"); 
	$con = new PDO($connectionString, USER,PASS);	
	
	//Executa processa
	
    $sql = "UPDATE cidade SET nome = '$nome', idEstado = $idEstado WHERE idCidade = $idCidade;";
      
    if($con->query($sql)){
        $msg = "Gravado com sucesso!";
    }else{
        $msg = "Erro ao gravar!";
    }
	
	echo $sql;
	echo "<br>";
	echo $msg;
	
	header('Location: ../Cidade.php');
?>
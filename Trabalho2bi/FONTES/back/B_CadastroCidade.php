<?php 
	// Recebe e arruma dados
    $idEstado = $_POST["idEstado"];
	$nome = strtoupper($_POST["nome"]);
	
	//Valida dados
	include("../include/connection/config.php"); 
	$con = new PDO($connectionString, USER,PASS);	
	
	//Executa processa
	
    $sql = "INSERT INTO cidade(nome, idEstado) VALUES('$nome',$idEstado);";
      
    if($con->query($sql)){
        $msg = "Gravado com sucesso!";
    }else{
        $msg = "Erro ao gravar!";
    }
	
	header('Location: ../Cidade.php');
?>
<?php 
	// Recebe e arruma dados
    $nome = $_POST["nome"];
    $sigla = $_POST["sigla"];
	$nome = strtoupper($nome);
	$sigla = strtoupper($sigla);
	
	//Valida dados
	include("../include/connection/config.php"); 
	$con = new PDO($connectionString, USER,PASS);	
	
	//Executa processa
	
    $sql = "INSERT INTO estado(nome, sigla) VALUES('$nome','$sigla');";
      
    if($con->query($sql)){
        $msg = "Gravado com sucesso!";
    }else{
        $msg = "Erro ao gravar!";
    }
	header('Location: ../Estado.php');
?>
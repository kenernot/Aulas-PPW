<?php 
	// Recebe e arruma dados
    $idCidade = $_POST["idCidade"];
	$idEstado = $_POST["idEstado"];
	$nome = strtoupper($_POST["nome"]);
	
	//Valida dados
	include("../include/connection/config.php"); 
	$con = new PDO($connectionString, USER,PASS);	
	
	$estadoExists = true;
	$sql = "SELECT NULL FROM estado WHERE idEstado = $idEstado LIMIT 1;";
	
	$result = $con->query($sql);
	
	if ($result->rowCount() == 0) {
		$estadoExists = false;
	}

	$valido = true;
	if (strlen($nome) > 50 or strlen($nome) == 0 or !preg_match("/^[a-zA-Z\ ]*$/",$nome) or !$estadoExists) {
		$valido = false;
		header("Location: ../EditarCidade.php?erro=1&id=$idCidade");
	} else if ($valido) {
		
		$sql = "SELECT NULL FROM cidade WHERE nome='$nome' AND idEstado=$idEstado AND idCidade != $idCidade LIMIT 1;";
		
		$result = $con->query($sql);
		
		if ($result->rowCount() > 0) {
			$valido = false;
			header("Location: ../EditarCidade.php?erro=2&id=$idCidade");
		} else {
	
			//Executa processa
			
			$sql = "UPDATE cidade SET nome = '$nome', idEstado = $idEstado WHERE idCidade = $idCidade;";
			  
			if($con->query($sql)){
				$msg = "Gravado com sucesso!";
			}else{
				$msg = "Erro ao gravar!";
			}
			header('Location: ../Cidade.php');
		}
	}
?>
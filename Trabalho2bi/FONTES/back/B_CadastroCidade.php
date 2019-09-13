<?php 
	// Recebe e arruma dados
    $idEstado = $_POST["idEstado"];
	$nome = strtoupper($_POST["nome"]);
	
	//Valida dados
	include("../include/connection/config.php"); 
	$con = new PDO(CONNECTIONSTRING, USER,PASS);	
	
	$estadoExists = true;
	$sql = "SELECT NULL FROM estado WHERE idEstado = $idEstado LIMIT 1;";
	
	$result = $con->query($sql);
	
	if ($result->rowCount() == 0) {
		$estadoExists = false;
	}

	$valido = true;
	if (strlen($nome) > 50 or strlen($nome) == 0 or !preg_match("/^[a-zA-Z\ ]*$/",$nome) or !$estadoExists) {
		$valido = false;
		header("Location: ../CadastroCidade.php?erro=1");
	} else if ($valido) {
		
		$sql = "SELECT NULL FROM cidade WHERE nome='$nome' AND idEstado=$idEstado LIMIT 1;";
		
		$result = $con->query($sql);
		
		if ($result->rowCount() > 0) {
			$valido = false;
			header("Location: ../CadastroCidade.php?erro=2");
		} else {
	
			//Executa processa
			
			$sql = "INSERT INTO cidade(nome, idEstado) VALUES('$nome',$idEstado);";
			  
			if($con->query($sql)){
				$msg = "Gravado com sucesso!";
			}else{
				$msg = "Erro ao gravar!";
			}
			header('Location: ../Cidade.php');
		}
	}
?>
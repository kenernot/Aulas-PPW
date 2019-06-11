<?php 
	// Recebe e arruma dados
    $nome = $_POST["nome"];
    $sigla = $_POST["sigla"];
	$nome = strtoupper($nome);
	$sigla = strtoupper($sigla);
	
	//Valida dados


	$valido = true;
	if (strlen($nome) > 50 or strlen($nome) == 0 or strlen($sigla) != 2 or !preg_match("/^[a-zA-Z\ ]*$/",$nome) or !preg_match("/^[a-zA-Z]{2}$/",$sigla)) {
		$valido = false;
		header("Location: ../CadastroEstado.php?erro=1");
	} else if ($valido) {
		include("../include/connection/config.php"); 
		$con = new PDO($connectionString, USER,PASS);
		
		$sql = "SELECT NULL FROM estado WHERE nome='$nome' AND sigla='$sigla' LIMIT 1;";
		
		$result = $con->query($sql);
		
		if ($result->rowCount() > 0) {
			$valido = false;
			header("Location: ../CadastroEstado.php?erro=2");
		} else {
	
			//Executa processa
			
			$sql = "INSERT INTO estado(nome, sigla) VALUES('$nome','$sigla');";
			  
			if($con->query($sql)){
				$msg = "Gravado com sucesso!";
			}else{
				$msg = "Erro ao gravar!";
			}
			header('Location: ../Estado.php');
		}
	}
?>
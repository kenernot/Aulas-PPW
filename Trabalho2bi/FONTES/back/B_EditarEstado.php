<?php 
	// Recebe e arruma dados
    $idEstado = $_POST["idEstado"];
	$nome = strtoupper($_POST["nome"]);
	$sigla = strtoupper($_POST["sigla"]);
	

	
	
	
	
	$valido = true;
	if (strlen($nome) > 50 or strlen($nome) == 0 or strlen($sigla) != 2 or !preg_match("/^[a-zA-Z\ ]*$/",$nome) or !preg_match("/^[a-zA-Z]{2}$/",$sigla)) {
		$valido = false;
		header("Location: ../EditarEstado.php?erro=1&id=$idEstado");
	} else if ($valido) {
		include("../include/connection/config.php"); 
		$con = new PDO($connectionString, USER,PASS);
		
		$sql = "SELECT NULL FROM estado WHERE nome='$nome' AND sigla='$sigla' AND idEstado != $idEstado LIMIT 1;";
		
		$result = $con->query($sql);
		
		if ($result->rowCount() > 0) {
			$valido = false;
			header("Location: ../EditarEstado.php?erro=2&id=$idEstado");
		} else {
			//Executa processa
			$sql = "UPDATE estado SET nome = '$nome', sigla = '$sigla' WHERE idEstado = $idEstado;";
      
			if($con->query($sql)){
				$msg = "Gravado com sucesso!";
			}else{
				$msg = "Erro ao gravar!";
			}
			header('Location: ../Estado.php');
		}
	}
?>
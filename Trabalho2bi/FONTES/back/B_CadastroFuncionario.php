<?php 
	// Recebe e arruma dados
	include_once "../classes/Funcionario.php";
	

	$nome = strtoupper($_POST["nome"]);
	$rg = $_POST["rg"];
	$matricula = $_POST["matricula"];	
	$departamento = strtoupper($_POST["departamento"]);	
	//Executa processa
	
	$func = new Funcionario($nome,$rg,$matricula,$departamento);
	
    
	$valido = true;
	if (strlen($nome) > 70 or
		strlen($nome) == 0 or
			strlen($rg) > 20 or
				strlen($rg) == 0 or
					!preg_match("/^[a-zA-Z\ ]*$/",$nome) or 
						!preg_match("/^[0-9]*$/",$rg) or 
							strlen($matricula) > 70 or
								strlen($matricula) == 0 or
									strlen($departamento) > 45 or
										strlen($departamento) == 0) {
		
		$valido = false;
		header("Location: ../CadastroFuncionario.php?erro=1");
	} else if ($valido) {
		include("../include/connection/config.php"); 
		$con = new PDO($connectionString, USER,PASS);
		
		
		
		$sql = "SELECT NULL FROM funcionario WHERE nome='".$func->getNome()."' LIMIT 1;";
		
		$result = $con->query($sql);
		
		if ($result->rowCount() > 0) {
			$valido = false;
			header("Location: ../CadastroFuncionario.php?erro=2");
		} else {
	
			//Executa processa
			
			$sql = "INSERT INTO funcionario(nome, rg, matricula, departamento) VALUES('".$func->getNome()."','".$func->getRg()."', '".$func->getMatricula()."', '".$func->getDepartamento()."');";

			if($con->query($sql)){
				$msg = "Gravado com sucesso!";
			}else{
				$msg = "Erro ao gravar!";
			}
			header('Location: ../Funcionario.php');
		}
	}

?>
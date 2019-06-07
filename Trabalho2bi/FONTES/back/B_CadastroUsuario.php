<?php 
	// Recebe e arruma dados
    $user = strtolower($_POST["user"]);
	$senha = MD5($_POST["senha"]);
	$nivel = $_POST["nivel"];
	
	//Valida dados
	include("../include/connection/config.php"); 
	$con = new PDO($connectionString, USER,PASS);	
	
	//Executa processa
	
    $sql = "INSERT INTO usuario(user, password, nivel) VALUES('$user','$senha', '$nivel');";
      
    if($con->query($sql)){
        $msg = "Gravado com sucesso!";
    }else{
        $msg = "Erro ao gravar!";
    }
	
	echo $sql;
	echo "<br>";
	echo $msg;
	
	header('Location: ../Usuario.php');
?>
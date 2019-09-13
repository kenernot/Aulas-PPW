<?php
	// Inicia sessões 
	session_start(); 
	

	
	// Verifica se existe os dados da sessão de login 
	if(!isset($_SESSION["user"]) && !isset($_SESSION["nivel"])) { 
		// Usuário não logado! Redireciona para a página de login 
		header("Location: Login.php"); 
		exit; 
	} 
	
	include("include/head.php");
	include("include/top.php");
	include("include/connection/config.php");


	echo '<hr>';
	function erro() {
		throw new ExceptionPersonalizada();
	}
	
	include_once "classes/ExceptionPersonalizada.php";
	

	
	try {
		erro();
	} catch (ExceptionPersonalizada $e) {
		echo 'Erro: ' . $e->getMessage();
	}

	include("include/bottom.php");
?>
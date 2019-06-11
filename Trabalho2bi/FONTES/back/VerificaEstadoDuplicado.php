<?php
	//envio o charset para evitar problemas com acentos
	header("Content-Type: text/html; charset=UTF-8");

	$nome = filter_input(INPUT_GET, 'nome');
	$sigla = filter_input(INPUT_GET, 'sigla');
	//$nome = $_POST['nome'];
	//$sigla = $_POST['sigla'];
	
	$nome = strtoupper($nome);
	$sigla = strtoupper($sigla);
	
	$sql = "SELECT * FROM `estado` WHERE `nome` = '{$nome}' AND `sigla` = '{$sigla}' limit 1"; //monto a query
	 //
	include("../include/connection/config.php"); 
	$con = new PDO($connectionString, USER,PASS);	

	$result = $con->query($sql); //executo a query

	if( $result->rowCount() > 0 ) {//se retornar algum resultado
		$duplicado = '1';
	} else {
		$duplicado = '0';
	}
  
	$vetor[] = array(
		'duplicado'	=> $duplicado
	);
	
	//echo $duplicado;
	echo(json_encode($vetor));
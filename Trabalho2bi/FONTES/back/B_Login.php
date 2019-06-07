<?php

session_start(); 
//var_dump($_POST);
//echo "<hr>";
$usuario = MD5($_POST["login"]); 
$senha =  MD5($_POST["pass"]); 
//echo "<hr>";
//echo $_POST["login"];
//echo $_POST["pass"];
//echo "<hr>";



include("../include/connection/config.php");
try {
	$con = new PDO($connectionString, USER,PASS);
	$sql = "SELECT idUsuario,user,nivel FROM usuario WHERE MD5(user) = '".$usuario."' AND password = '".$senha."' limit 1;";
	$result = $con->query($sql);
	//echo "<hr>";
	//echo $sql;
	//echo "<hr>";
	$deu = false;
	
	//var_dump($result);
	//echo "<hr>";
	if ($result) {
		while ($row = $result-> fetch(PDO::FETCH_OBJ)) {
			$_SESSION["idUsuario"] = $row->idUsuario;
			$_SESSION["user"] = $row->user;
			$_SESSION["nivel"] = $row->nivel;
			//echo $row->user;
			//echo $row->nivel;
		}
		$deu = true;
	} 
	$con = null;
	
	
	if ($deu) {
		//header("Location: ../index.php"); 
		//
		$content = http_build_query(array(
			'Erro1' => 'Errado1',
			'Erro2' => 'Errado2',
			'Erro3' => 'Errado3',
		));
  
		$context = stream_context_create(array(
			'http' => array(
				'method'  => 'POST',
				'content' => $content,
			)
		));
		
		header("Location: ../index.php");
		$result = file_get_contents('../index.php', null, $context);
		
		//
	} else {
		header("Location: ../Login.php"); 
	}		
	
} catch(PDOException $e) {
	print "Erro!: ".$e.getMessage()."\n";
	die();
}

?>

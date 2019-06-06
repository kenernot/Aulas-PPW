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
	$sql = "SELECT user,nivel FROM usuario WHERE MD5(user) = '".$usuario."' AND password = '".$senha."' limit 1;";
	$result = $con->query($sql);
	//echo "<hr>";
	//echo $sql;
	//echo "<hr>";
	$deu = false;
	
	//var_dump($result);
	//echo "<hr>";
	if ($result) {
		while ($row = $result-> fetch(PDO::FETCH_OBJ)) {
			$_SESSION["user"] = $row->user;
			$_SESSION["nivel"] = $row->nivel;
			//echo $row->user;
			//echo $row->nivel;
		}
		$deu = true;
	} 
	$con = null;
	
	
	if ($deu) {
		header("Location: ../index.php"); 
	} else {
		header("Location: ../Login.php"); 
	}		
	
} catch(PDOException $e) {
	print "Erro!: ".$e.getMessage()."\n";
	die();
}

?>

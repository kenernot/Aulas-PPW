<?php
include("connection\config.php");

try {
	$con = new PDO($connectionString, USER,PASS);

	$result = $con->query("SELECT MATRICULA, NOME FROM tusu;");

	if ($result) {
		foreach($result as $row) {
			echo $row['MATRICULA'].' - '.$row['NOME']. '<br>';
		}
	}


	$con = null;
	
	echo "FIM";
	
} catch(PDOException $e) {
	print "Erro!: ".$e.getMessage()."\n";
	die();
}

?>
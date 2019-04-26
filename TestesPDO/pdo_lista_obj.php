<?php
include("connection\config.php");

try {
	$con = new PDO($connectionString, USER,PASS);

	$result = $con->query("SELECT MATRICULA, NOME FROM tusu;");

	if ($result) {
		while ($row = $result-> fetch(PDO::FETCH_OBJ)) {
			echo $row->MATRICULA. ' - ' .$row->NOME.'<br>';
		}
	}


	$con = null;
	
	echo "FIM";
	
} catch(PDOException $e) {
	print "Erro!: ".$e.getMessage()."\n";
	die();
}

?>
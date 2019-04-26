<?php
include("connection\config.php");

try {
	$con = new PDO($connectionString, USER,PASS);
	$con->exec("INSERT INTO tusu (MATRICULA, NOME) VALUES(33,'Érico Veríssimo');");
	$con->exec("INSERT INTO tusu (MATRICULA, NOME) VALUES(44,'John Lennon');");
	$con->exec("INSERT INTO tusu (MATRICULA, NOME) VALUES(55,'Mahatma Gandhi');");
	$con->exec("INSERT INTO tusu (MATRICULA, NOME) VALUES(66,'Ayrton Senna');");

	$con = null;
	
	echo "FIM";
	
} catch(PDOException $e) {
	print "Erro!: ".$e.getMessage()."\n";
	die();
}

?>
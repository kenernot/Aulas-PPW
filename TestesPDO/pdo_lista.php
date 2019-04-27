<?php
include("connection\config.php");
include("head/head.php");
include("head/nav.php");
try {
	$con = new PDO($connectionString, USER,PASS);

	$result = $con->query("SELECT MATRICULA, NOME FROM tusu;");

	if ($result) {
		echo "<table class='table table-dark  table-striped'><thead><tr><th scope='col'>#</th><th scope='col'>Matricula</th><th scope='col'>Nome</th></tr></thead><tbody>";
		$i = 0;
		foreach($result as $row) {
			$i++;
			echo "<tr>";
			echo "<th scope='row'>".$i."</th>";
			echo "<td>".$row['MATRICULA'].'</td>'."<td>".$row['NOME'].'</td>';
			echo "</tr>";
		}
		
		echo "</tbody></table>";
	}
	
	$con = null;
	
} catch(PDOException $e) {
	print "Erro!: ".$e.getMessage()."\n";
	die();
}


include("head/voltar.php");
?>

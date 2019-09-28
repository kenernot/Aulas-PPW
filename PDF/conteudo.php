<?php
include("connection\config.php");
//include("head/head.php");
try {
	$con = new PDO($connectionString, USER,PASS);

	$result = $con->query("SELECT MATRICULA, NOME FROM tusu;");

	if ($result) {
		echo "<table class='table table-dark table-striped' border='1' style='border-collapse: collapse;'><thead><tr><th scope='col'>#</th><th scope='col'>Matricula</th><th scope='col'>Nome</th></tr></thead><tbody>";
		$i = 0;
		while ($row = $result-> fetch(PDO::FETCH_OBJ)) {
			$i++;
			echo "<tr>";
			echo "<th scope='row' style='padding: 10px;'>".$i."</th>";
			echo "<td style='padding: 10px;'>".$row->MATRICULA.'</td>'."<td style='padding: 10px;'>".$row->NOME.'</td>';
			echo "</tr>";
		}
		echo "</tbody></table>";
	}
	$con = null;
	
} catch(PDOException $e) {
	print "Erro!: ".$e.getMessage()."\n";
	die();
}

?>

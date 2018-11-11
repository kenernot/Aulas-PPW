<?php 
	include('includes/conecta.inc.php');

	$pesquisa = $_REQUEST['pesquisa'];
	$query = "select t.idMidiaGenero, t.nome from midiagenero t where t.idMidiaGenero not in(select idgenero from itensmidiagenero where idmidia = $pesquisa);";
	$result = mysql_query($query,$conexao) or die(mysql_error());
	
	while ($row = mysql_fetch_assoc($result) ) {
		$vetor[] = array(
			'idMidiaGenero'	=> $row["idMidiaGenero"],
			'nome' => utf8_encode($row["nome"]),
		);
	}

	
	echo(json_encode($vetor));

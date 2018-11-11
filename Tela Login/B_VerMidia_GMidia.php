<?php 
	include('includes/conecta.inc.php');

	$pesquisa = $_REQUEST['pesquisa'];
	$query = "select itensmidiagenero.idGenero, midiagenero.nome from itensmidiagenero inner join midiagenero on midiagenero.idMidiaGenero = itensmidiagenero.idGenero where idmidia=$pesquisa;";
	$result = mysql_query($query,$conexao) or die(mysql_error());
	
	while ($row = mysql_fetch_assoc($result) ) {
		$vetor[] = array(
			'idGenero'	=> $row["idGenero"],
			'nome' => utf8_encode($row["nome"]),
		);
	}

	
	echo(json_encode($vetor));

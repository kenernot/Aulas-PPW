<?php 
	include('includes/conecta.inc.php');

	$pesquisa = $_REQUEST['pesquisa'];
	$query = "select midia.idmidia,midia.titulo from midia inner join tipomidia on tipomidia.idTipoMidia = midia.idTipoMidia where tipomidia.nome like '%$pesquisa%' or midia.titulo like '%$pesquisa%';";
	$result = mysql_query($query,$conexao) or die(mysql_error());
	
	while ($row = mysql_fetch_assoc($result) ) {
		$vetor[] = array(
			'idmidia'	=> $row["idmidia"],
			'titulo' => utf8_encode($row["titulo"]),
		);
	}

	
	echo(json_encode($vetor));

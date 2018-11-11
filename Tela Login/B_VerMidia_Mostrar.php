<?php 
	include('includes/conecta.inc.php');
	
	$lista = $_REQUEST['lista'];
	$query = "select midiagenero.nome as 'MidiaGenero' from midiagenero inner join itensmidiagenero on itensmidiagenero.idGenero = midiagenero.idMidiaGenero inner join midia on midia.idMidia = itensmidiagenero.idMidia where midia.idMidia = $lista;";
	$result = mysql_query($query,$conexao) or die(mysql_error());
	$generos = '';
	while ($row = mysql_fetch_assoc($result) ) {
		$generos .= utf8_encode($row["MidiaGenero"]). ', ';
	}
	$generos = substr($generos, 0, strlen($generos)-2);
	if ($generos == '') {$generos = 'NADA INFORMADO';}
	
	

	
	
	
	
	$query = "select tipomidia.nome as 'tipo', tipomidia.idTipoMidia as 'idtipo', midiaclassificacao.nome as 'classificacao', midia.idMidiaClassificacao as 'idclassificacao', midia.titulo, midia.duracao, midia.elenco, midia.nacionalidade, midia.sinopse, midia.dataLancamento, midia.qtdEpisodios, midia.qtdTemporadas from midia inner join tipomidia on tipomidia.idTipoMidia = midia.idTipoMidia inner join midiaclassificacao on midiaclassificacao.idMidiaClassificacao = midia.idMidiaClassificacao where midia.idMidia = $lista;";
	$result = mysql_query($query,$conexao) or die(mysql_error());
	
	
	
	while ($row = mysql_fetch_assoc($result) ) {
		$vetor[] = array(
			'tipo'	=> $row["tipo"],
			'idtipo'	=> $row["idtipo"],
			'idclassificacao'	=> $row["idclassificacao"],
			'classificacao' => utf8_encode($row["classificacao"]),
			'titulo' => utf8_encode($row["titulo"]),
			'duracao' => utf8_encode($row["duracao"]),
			'elenco' => utf8_encode($row["elenco"]),
			'nacionalidade' => utf8_encode($row["nacionalidade"]),
			'sinopse' => utf8_encode($row["sinopse"]),
			'dataLancamento' => utf8_encode($row["dataLancamento"]),
			'qtdEpisodios' => utf8_encode($row["qtdEpisodios"]),
			'qtdTemporadas' => utf8_encode($row["qtdTemporadas"]),
			'generos' => $generos,
			'idmidia' => $lista
		);
	}

	
	echo(json_encode($vetor));

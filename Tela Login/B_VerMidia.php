<?php
include('includes/conecta.inc.php');
session_start(); 
$titulo = $_POST["titulo"];
$tipo = $_POST["tipo"]; 
$classificacao = $_POST["classificacao"];	
$temporadas = $_POST["temporadas"];
$episodios = $_POST["episodios"];
$duracao = $_POST["duracao"];
$datalancamento = $_POST["datalancamento"];
$nacionalidade = $_POST["nacionalidade"];
$elenco = $_POST["elenco"];
$sinopse = $_POST["sinopse"];
$idmidia = $_POST["idmidia"];
$generosmidia = $_POST['generosmidia'];

if (empty ($datalancamento)) {
	$datalancamento = 'null';	
} else {
	$datalancamento = "'".$datalancamento."'";
}
if (!is_int($temporadas)) {
	$temporadas = 'null';
}
if (!is_int($episodios)) {
	$episodios = 'null';
}

if (!isset($generosmidia)) {
	?>
	<script language="JavaScript">
		alert("Generos vazio!");
		window.history.go(-1);
	</script>
	<?php
} else if (empty($titulo)) {
	?>
	<script language="JavaScript">
		alert("Título vazio!");
		window.history.go(-1);
	</script>
	<?php
}	else {
	//Aqui deve começar cadastro
	$idUsuario = $_SESSION["idUsuario"];
	$sql = "update MIDIA set idTipoMidia = $tipo, idMidiaClassificacao = $classificacao, idUsuario = $idUsuario, titulo = '$titulo', duracao = '$duracao', elenco = '$elenco', nacionalidade = '$nacionalidade', sinopse = '$sinopse', datalancamento = $datalancamento, qtdepisodios = $episodios, qtdtemporadas = $temporadas where idmidia=$idmidia;"; 

	mysql_query($sql,$conexao);
	echo $sql;
	$sql = "delete from itensmidiagenero where idmidia=$idmidia;";
	$result_ver = mysql_query($sql,$conexao);
	echo $idMidia;
	for ($i = 0; $i < count($generosmidia);$i++) {
		$idGenero = $generosmidia[$i];
		$sql = "insert into itensmidiagenero(idMidia, idGenero) values ($idmidia, $idGenero);";
		echo "	<br>";
		echo $sql	;
		mysql_query($sql,$conexao);
	}
	?>
	
	<script language="JavaScript">
		alert("Cadastrado com sucesso!");
		window.history.go(-1);
	</script>
	
	<?php
}
?>
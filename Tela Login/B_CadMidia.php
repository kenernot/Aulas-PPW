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

$generosmidia = $_POST['generosmidia'];

if (empty ($datalancamento)) {
	$datalancamento = 'null';	
}

if (!isset($generosmidia)) {
	?>
	<script language="JavaScript">
		alert("Generos vazio!");
		window.history.go(-1);
	</script>
	<?php
} else {
	//Aqui deve começar cadastro
	$idUsuario = $_SESSION["idUsuario"];
	$sql = "INSERT INTO MIDIA (idTipoMidia, idMidiaClassificacao, idUsuario, titulo, duracao, elenco, nacionalidade, sinopse, datalancamento, qtdepisodios, qtdtemporadas) values ($tipo, $classificacao, $idUsuario, '$titulo', '$duracao', '$elenco', '$nacionalidade', '$sinopse', $datalancamento, $episodios, $temporadas);";
	mysql_query($sql,$conexao);
	$sql = "select max(idMidia) as 'MAX' from midia;";
	$result_ver = mysql_query($sql,$conexao);
	$dados = @mysql_fetch_array($result_ver);
	$idMidia = $dados["MAX"]; 
	echo $idMidia;
	for ($i = 0; $i < count($generosmidia);$i++) {
		$idGenero = $generosmidia[$i];
		$sql = "insert into itensmidiagenero(idMidia, idGenero) values ($idMidia, $idGenero);";
		echo "	<br>";
		echo $sql	;
		mysql_query($sql,$conexao);
	}
	//Salvar os generos aqui
}
?>
<?php
// Incluir aquivo de conexão
include("../include/config.dba.php");

$conexao = mysql_pconnect($host,$user,$pass);
mysql_select_db($base,$conexao);

 
// Recebe o valor enviado
$valor = $_GET['valor'];
 
// Procura titulos no banco relacionados ao valor
$sql = mysql_query("SELECT * FROM tusu WHERE NOME LIKE '%".$valor."%'");
 
// Exibe todos os valores encontrados
while ($dados = mysql_fetch_object($sql)) {
	echo "<a href=\"javascript:func()\" onclick=\"exibirConteudo('".$dados->ID_TUSU."')\">" . $dados->NOME . "</a><br />";
}
 
// Acentuação
header("Content-Type: text/html; charset=ISO-8859-1",true);
?>
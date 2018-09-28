<?php
// Incluir aquivo de conexуo
include("../include/config.dba.php");

$conexao = mysql_pconnect($host,$user,$pass);
mysql_select_db($base,$conexao);

// Recebe a id enviada no mщtodo GET
$id = $_GET['id'];
 
// Seleciona a noticia que tem essa ID
$sql = mysql_query("SELECT * FROM tusu WHERE ID_TUSU = '".$id."'");
 
// Pega os dados e armazena em uma variсvel
$dados = mysql_fetch_object($sql);
 
// Exibe o conteњdo da notica
echo $dados->MATRICULA." - ".$dados->NOME;
 
// Acentuaчуo
header("Content-Type: text/html; charset=ISO-8859-1",true);
?>
<?php
include('includes/conecta.inc.php');
session_start(); 
$usuario = $_POST["usuario"]; 
$nivel =  $_POST["nivel"]; 
$ver = "update usuario set nivel = '$nivel' where usuario.idUsuario = '$usuario'";

$result_ver = mysql_query($ver,$conexao);
?>
	<script language="JavaScript">
		alert("Permissão alterada com sucesso!");
		window.location = "http://127.0.0.1/aulas-ppw/Tela%20Login/F_RelUsuario.php";
	</script>
<?php


?>

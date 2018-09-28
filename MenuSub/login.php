<?php
session_start();

include('include/config.dba.php');

$conexao = mysql_pconnect($host,$user,$pass);
mysql_select_db($base,$conexao);


$usuario = $_POST["usuario"]; 
$senha =  md5($_POST["senha"]); 

$ver = "SELECT * from tusu where MATRICULA = $usuario and SENHA = '$senha'";
$result_ver = mysql_query($ver,$conexao);
$n_ver = mysql_num_rows($result_ver);


if($n_ver!=0){
	$_SESSION["nome"] = mysql_result($result_ver, 0, 'NOME');
	echo "\n <script language=\"JavaScript\">";
	echo "\n <!--";
	echo "\n 	location.href = \"menu.php\";";
	echo "\n //-->";
	echo "\n </script>";
}else{
	?>
	<script language="JavaScript">
		alert("Usuário/Senha Incorretos, favor verificar!!!");
		window.history.go(-1);
	</script>
	<?php

}

?>
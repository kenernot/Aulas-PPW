<?php
include('include/config.dba.php');

$conexao = mysql_pconnect($host,$user,$pass);
mysql_select_db($base,$conexao);


$usuario = $_POST["usuario"]; 
$senha =  $_POST["senha"]; 

$ver = "SELECT * from TUSU where MATRICULA = $usuario and SENHA = '$senha'";
$result_ver = mysql_query($ver,$conexao);
$n_ver = mysql_num_rows($result_ver);

if($n_ver!=0){
	echo "\n <script language=\"JavaScript\">";
	echo "\n <!--";
	echo "\n 	location.href = \"index_menu.html\";";
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
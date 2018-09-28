<?php
include('includes/conecta.inc.php');
session_start(); 
$usuario = $_POST["usuario"]; 
$senha =  md5($_POST["senha"]); 

$ver = "SELECT * from USUARIO where USUARIO = '$usuario' and SENHA = '$senha'";
$result_ver = mysql_query($ver,$conexao);
$n_ver = mysql_num_rows($result_ver);

if($n_ver!=0){
		$dados = @mysql_fetch_array($result_ver); 
		$_SESSION["usuario"]= $dados["usuario"]; 
		$_SESSION["nivel"] = $dados["nivel"]; 
		$_SESSION["idUsuario"] = $dados["idUsuario"]; 
		header("Location: index.php"); 
}else{
	/*?>
	<script language="JavaScript">
		alert("Usuário/Senha Incorretos, favor verificar!!!");
		//window.history.go(-1);
	</script>
	<?php */
	header("Location: F_Login.php");
}

?>

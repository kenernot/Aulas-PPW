<?php
include('includes/conecta.inc.php');
session_start(); 
$usuario = md5($_POST["usuario"]); 
$senha =  md5($_POST["senha"]); 

$ver = "SELECT idUsuario, usuario AS 'usuario', senha, nivel, dataCadastro, imagemPerfil, email from USUARIO where MD5(usuario) = '$usuario' and SENHA = '$senha';";
echo $ver;
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
		window.history.go(-1);
	</script>
	<?php */
	header("Location: F_Login.php");
}

?>

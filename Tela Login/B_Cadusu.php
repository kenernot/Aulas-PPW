<?php
include('includes/conecta.inc.php');

$usuario = $_POST["usuario"]; 
$senha =  md5($_POST["senha"]); 
$confirmarsenha =  md5($_POST["confirmarsenha"]); 
$email = ($_POST["email"]); 
$confirmaremail = ($_POST["confirmaremail"]); 

if($senha != $confirmarsenha or $email!=$confirmaremail){
?>
	<script language="JavaScript">
		alert("Senha/Email Incorretos, favor verificar!!!");
		window.history.go(-1);
	</script>
	<?php
}else{
	$ver = "SELECT * from USUARIO where (USUARIO = '$usuario') or (email = '$email')";
	$result_ver = mysql_query($ver,$conexao);
	$n_ver = mysql_num_rows($result_ver);

	if($n_ver!=0){
		?>
	<script language="JavaScript">
		alert("Senha/Email já cadastrados, favor escolher outro!");
		window.history.go(-1);
	</script>
	<?php
	}else{
		$sql = "INSERT INTO USUARIO (usuario, senha, email, nivel) values ('$usuario', '$senha', '$email', 0);";
		mysql_query($sql,$conexao);
	?>
		<script language="JavaScript">
			alert("Cadastrado com sucesso!");
			window.history.go(-1);
		</script>
<?php
	}
}
?>
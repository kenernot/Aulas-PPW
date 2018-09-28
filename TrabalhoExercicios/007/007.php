	<?php
		$nome			=	$_POST["nome"];
		$sexo			=	$_POST["sexo"];
		$email			=	$_POST["email"];
		$email2			=	$_POST["email2"];
		$anonascimento	=	$_POST["anonascimento"];
		$cidade			=	$_POST["cidade"];
		$estado			=	$_POST["estado"];
		// New ones
		$usuario		=	$_POST["usuario"];
		$pass1			=	$_POST["pass1"];
		$pass2			=	$_POST["pass2"];
		
		$R = "FALHA";
		
		if (isset($_POST["termos"])) {
			$termos	=	"Sim";
		} else {
			$termos	=	0;
		}
		
		if ((empty($nome)) || (empty($sexo)) || (empty($email)) || (empty($email2)) || (empty($anonascimento)) || (empty($cidade)) || (empty($estado)) || (empty($termos)) || (empty($usuario)) || (empty($pass1)) || (empty($pass2))) {
			$R = "FALHA: CAMPOS VAZIOS";
		} elseif ($email != $email2) {
			$R = "FALHA: E-MAILS NÃO COINCIDEM";
		} elseif ((date("Y") - $anonascimento) < 18) {
			$R = "FALHA: MENOR DE 18 ANOS";
		} else {
			$R = "SUCESSO";
		}
		
		if ($R == "SUCESSO") {
			echo $R;
		} else {

			echo "<script>";
			echo "	alert('".$R."');";
			echo "	history.back();";
			echo "</script>";
		}
		
	?>
   
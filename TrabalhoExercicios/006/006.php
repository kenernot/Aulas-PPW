	<?php
		$nome			=	$_POST["nome"];
		$sexo			=	$_POST["sexo"];
		$email			=	$_POST["email"];
		$email2			=	$_POST["email2"];
		$anonascimento	=	$_POST["anonascimento"];
		$cidade			=	$_POST["cidade"];
		$estado			=	$_POST["estado"];
		
		
		if (isset($_POST["termos"])) {
			$termos	=	"Sim";
		} else {
			$termos	=	0;
		}
		
		$R = "FALHA";
		
		if ((empty($nome)) || (empty($sexo)) || (empty($email)) || (empty($email2)) || (empty($anonascimento)) || (empty($cidade)) || (empty($estado)) || (empty($termos))) {
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
   
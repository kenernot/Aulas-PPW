	<?php
		$nome	=	$_POST["nome"];
		$sexo	=	$_POST["sexo"];
		$email	=	$_POST["email"];
		$email2	=	$_POST["email2"];
		
		$R = "FALHA";
		
		if (		(empty($nome)) || (empty($sexo)) || (empty($email)) || (empty($email2))	) {
			$R = "FALHA: CAMPOS VAZIOS";
		} elseif ($email != $email2) {
			$R = "E-MAILS NÃO COINCIDEM";
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
   
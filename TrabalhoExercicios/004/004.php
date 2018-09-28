	<?php
		$nome	=	$_POST["nome"];
		$email	=	$_POST["email"];
		$idade	=	$_POST["idade"];
		$msg	=	$_POST["msg"];
		
		$R = "FALHA";
		
		if (		(empty($nome)) || (empty($email)) || (empty($idade)) || (empty($msg))	) {
			$R = "FALHA: CAMPOS VAZIOS";
		} elseif ($idade < 18) {
			$R = "FALHA: SOMENTE PARA ADULTOS :)";
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
   
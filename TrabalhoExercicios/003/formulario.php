	<?php
		$infos[0]	=	$_POST["nome"];
		$infos[1]	=	$_POST["email"];
		$infos[2]	=	$_POST["sexo"];
		#
		if (isset($_POST["valor1"])) {
			$infos[3]	=	$_POST["valor1"];
		} else {
			$infos[3]	= "Não";
		}
		
		#
		$infos[4]	=	$_POST["pais"];
		$kind	= array("Nome: ", "E-Mail: ", "Sexo: ", "Estudante: ", "País: ");
		
		for ($i = 0; $i < 5; $i++) {
			echo $kind[$i].$infos[$i]."<br>";
		}
		
	?>
   
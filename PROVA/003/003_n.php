	<?php
		$notas[0] = $_POST["valor1"];
		$notas[1] = $_POST["valor2"];
		$notas[2] = $_POST["valor3"];
		$notas[3] = $_POST["valor4"];
		$media = 0;
		$show = "";
		for ($i = 0; $i < 4; $i++) {
			$media += $notas[$i];
		}
		$media /= 4;
		
		if ($media >= 70) {
			$show = "APROVADO";
		} else {
			$show = "REPROVADO";
		}
		
		echo $media." = <b>".$show."</b>	";
		
	?>
   
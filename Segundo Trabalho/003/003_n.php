	<?php
		$valor1 = strtoupper($_POST["valor1"]);
		
		//Limitador de linhas de linhas
		$linhas = 4;
		//Controle, não mexa :D
		$controle = 0;
		while ($linhas != $controle) {
			$controle++;
			for ($i = 0; $i < $controle; $i++) {
				echo $valor1. " ";
			}
			echo "<br>";
		}
	?>
   
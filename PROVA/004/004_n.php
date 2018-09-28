	<?php
		$valor1 = $_POST["valor1"];
		
		$resultado = 0;
		
		if ($valor1 <= 300) {
			$resultado = $valor1 * 1.5;
		} else {
			$resultado = $valor1 * 1.3;
		}
		
		echo "Salário reajustado: ".$resultado;
		
	?>
   
	<?php
		$valor1 = $_POST["valor1"];
		$valor2 = $_POST["valor2"];
		$valor3 = $_POST["valor3"];
		
		$tipo = "";
		
		if ($valor1 != $valor2 and $valor2 != $valor3 and $valor1 != $valor3) {
			$tipo = "ESCALENO";
		} else if ($valor1 == $valor2 and $valor3 == $valor1) {
			$tipo = "EQUILATERO";
		} else {
			$tipo = "ISOCELES";
		}
		
		echo $tipo;
	?>
   
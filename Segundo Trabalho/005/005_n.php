	<?php
		$valor1 = $_POST["valor1"];
		$valor2 = strtoupper($_POST["valor2"]);
		
		$R = 0;
		
		if ($valor2 == "M") {
			//Peso Ideal = h – 100 – (h - 150) / 4
			$R = $valor1 - 100 - ($valor1 - 150) / 4;
		} else if ($valor2 == "F") {
			//Peso Ideal = h – 100 – (h – 150) / 2
			$R = $valor1 - 100 - ($valor1 - 150) / 2;
		} else {
			$R = "ERRO";
		}
		
		echo $R;
		
	?>
   
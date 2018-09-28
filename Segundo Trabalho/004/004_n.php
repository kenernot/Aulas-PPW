	<?php
		$valor1 = $_POST["valor1"];
		$valor2 = $_POST["valor2"];
		$R = 0;
		$show = "";
		
		if ($valor1 == 1) {
			$R = $valor2 * 0.9;
			$show = "O produto sairá no valor de R$".$R;
			
		} else if ($valor1 == 2) {
			$R = $valor2 * 0.95;
			$show = "O produto sairá no valor de R$".$R;
			
		} else if ($valor1 == 3) {
			$R = $valor2 * 1;
			$show = "O produto sairá no valor de R$".$R. " (R$".($R/2)." mensais)";
			
		} else if ($valor1 == 4) {
			$R = $valor2 * 1.1;
			$show = "O produto sairá no valor de R$".$R. " (R$".($R/3)." mensais)";
			
		} else {
			$show = "ERRO";
		}
		
		echo "<h4>".$show."</h4>";
		
	?>
   
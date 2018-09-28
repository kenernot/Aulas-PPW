	<?php
		$valor1 = $_POST["valor1"];
		$valor2 = $_POST["valor2"];
		$valor3 = $_POST["valor3"];
		
		$nuvem = 0;
		$vetor[0] = $valor1;
		$vetor[1] = $valor2;
		$vetor[2] = $valor3;
		
		for ($i = 0; $i < 3;$i++) {
			//echo $i." [i] <br>";
			for ($j = 0; $j < 3;$j++) {
				//echo $j." [j]-- <br>";
				if ($vetor[$i] > $vetor[$j]) {
					$nuvem = $vetor[$i];
					$vetor[$i] = $vetor[$j];
					$vetor[$j] = $nuvem;
				}
			}	
		}
		
		for ($i = 0; $i<3; $i++) {
			echo $vetor[$i]."<br>";
		}
	?>
   
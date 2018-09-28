	<?php
		$vetor[0] = $_POST["valor1"];
		$vetor[1] = $_POST["valor2"];
		$vetor[2] = $_POST["valor3"];
		$vetor[3] = $_POST["valor4"];
		$vetor[4] = $_POST["valor5"];
		$vetor[5] = $_POST["valor6"];
		$vetor[6] = $_POST["valor7"];
		$vetor[7] = $_POST["valor8"];
		$vetor[8] = $_POST["valor9"];
		$vetor[9] = $_POST["valor10"];
		$soma = 0;
		$negativos = 0;
		
		for ($i = 0; $i < 10; $i++) {
			if ($vetor[$i] >= 0) {
				$soma += $vetor[$i];
			} else {
				$negativos += 1;
			}
		}
		
		echo "Total somado: ". $soma. "<br>";
		echo "Total de negativos: ".$negativos;
	?>
   